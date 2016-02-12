<?php

namespace Civix\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Civix\FrontBundle\Form\Model\Petition as PetitionFormModel;
use Civix\CoreBundle\Model\Group\GroupSectionInterface;
use Civix\CoreBundle\Entity\Poll\Question\Petition;
use Civix\CoreBundle\Entity\Poll\Option;
use Civix\CoreBundle\Service\Payments\BalancedPayment;

abstract class PetitionController extends Controller
{
    /**
     * @Route("")
     * @Method({"GET"})
     * @Template("CivixFrontBundle:Petition:index.html.twig")
     */
    public function indexAction(Request $request)
    {
        /* @var $repository \Civix\CoreBundle\Repository\Poll\QuestionRepository */
        $repository = $this->getDoctrine()->getRepository('CivixCoreBundle:Poll\Question');

        $query = $repository->getPublishedPetitionsQuery($this->getUser());

        $paginator = $this->get('knp_paginator');
        $paginationPublished = $paginator->paginate(
            $query,
            $request->get('page_published', 1),
            10,
            array(
                'pageParameterName' => 'page_published',
                'sortDirectionParameterName' => 'dir_published',
                'sortFieldParameterName' => 'sort_published',
            )
        );

        $query = $repository->getNewPetitionsQuery($this->getUser());

        $paginationNew = $paginator->paginate(
            $query,
            $request->get('page_new', 1),
            10,
            array(
                'pageParameterName' => 'page_new',
                'sortDirectionParameterName' => 'dir_new',
                'sortFieldParameterName' => 'sort_new',
            )
        );

        return array(
            'paginationPublished' => $paginationPublished,
            'paginationNew' => $paginationNew,
            'token' => $this->getToken(),
            'emailPrice' => $this->get('civix_core.subscription_manager')->getPackage($this->getUser())
                    ->getPetitionDataEmailPrice(),
        );
    }

    /**
     * @Route("/new")
     * @Template("CivixFrontBundle:Petition:new.html.twig")
     */
    public function newAction(Request $request)
    {
        $class = $this->getPetitionClass();
        $petitionFormClass = $this->getPetitionFormClass();
        $petition = new $class();
        $form = $this->createForm(new $petitionFormClass($this->getUser()), new PetitionFormModel($petition));

        if ('POST' === $request->getMethod()) {
            if ($form->submit($request)->isValid()) {
                $manager = $this->getDoctrine()->getManager();

                $petition->setUser($this->getUser());

                /* @var $educationalContext \Civix\FrontBundle\Form\Model\EducationalContext */
                $educationalContext = $form->getData()->getEducationalContext();

                $petition->clearEducationalContext();

                foreach ($educationalContext->getItems() as $item) {
                    if ($item->getImageFile()) {
                        $this->get('vich_uploader.storage')->upload($item);
                    }
                    /**
                     * @var $entity \Civix\CoreBundle\Entity\Poll\EducationalContext
                     */
                    $entity = $item->createEntity();
                    if ($entity) {
                        $entity->setQuestion($petition);
                        $manager->persist($entity);
                    }
                }
                $option = new Option();
                $option->setQuestion($petition)
                    ->setValue('sign')
                ;
                $manager->persist($option);
                $manager->persist($petition);
                $manager->flush();
                $this->get('session')->getFlashBag()->add('notice', 'The petition has been successfully saved');

                return $this->redirect($this->generateUrl("civix_front_{$this->getUser()->getType()}_petition_index"));
            }
        }

        return [
            'form' => $form->createView(),
            'isShowGroupSection' => $this->isShowGroupSections($petition)
        ];
    }

    /**
     * @Route("/edit/{id}", requirements={"id"="\d+"})
     * @ParamConverter("petition", class="CivixCoreBundle:Poll\Question")
     * @Template("CivixFrontBundle:Petition:edit.html.twig")
     */
    public function editAction(Request $request, Petition $petition)
    {
        if ($petition->getUser() !== $this->getUser() || $petition->getPublishedAt()) {
            throw $this->createNotFoundException();
        }
        
        $petitionFormClass = $this->getPetitionFormClass();
        $form = $this->createForm(new $petitionFormClass($this->getUser()), new PetitionFormModel($petition));

        if ('POST' === $request->getMethod()) {
            if ($form->submit($request)->isValid()) {
                $petition->setUser($this->getUser());
                $manager = $this->getDoctrine()->getManager();

                /* @var $educationalContext \Civix\FrontBundle\Form\Model\EducationalContext */
                $educationalContext = $form->getData()->getEducationalContext();

                $petition->clearEducationalContext();

                foreach ($educationalContext->getItems() as $item) {
                    if ($item->getImageFile()) {
                        $this->get('vich_uploader.storage')->upload($item);
                    }
                    /**
                     * @var $entity \Civix\CoreBundle\Entity\Poll\EducationalContext
                     */
                    $entity = $item->createEntity();
                    if ($entity) {
                        $entity->setQuestion($petition);
                        $manager->persist($entity);
                    }
                }

                $manager->persist($petition);
                $manager->flush();
                $this->get('session')->getFlashBag()->add('notice', 'The petition has been successfully updated');

                return $this->redirect($this->generateUrl("civix_front_{$this->getUser()->getType()}_petition_index"));
            }
        }

        return [
            'form' => $form->createView(),
            'petition' => $petition,
            'isShowGroupSection' => $this->isShowGroupSections($petition)
        ];
    }

    /**
     * @Route("/publish/{id}", requirements={"id"="\d+"})
     * @ParamConverter("petition", class="CivixCoreBundle:Poll\Question")
     */
    public function publishAction(Request $request, Petition $petition)
    {
        if ($petition->getUser() !== $this->getUser() || $petition->getPublishedAt() ||
            $request->get('token') !== $this->getToken()) {
            throw new AccessDeniedHttpException();
        }

        if (true === $petition->getIsOutsidersSign()) {
            return $this->redirect(
                $this->generateUrl(
                    "civix_front_{$this->getUser()->getType()}_payment_buypublicpetition",
                    array('petition' => $petition->getId())
                )
            );
        }

        $petition->setPublishedAt(new \DateTime());
        $this->getDoctrine()->getManager()->flush($petition);
        $this->getDoctrine()
                ->getRepository('CivixCoreBundle:HashTag')->addForQuestion($petition);
        $this->get('civix_core.activity_update')->publishPetitionToActivity($petition);
        $this->get('session')->getFlashBag()->add('notice', 'The petition has been successfully published');

        return $this->redirect($this->generateUrl("civix_front_{$this->getUser()->getType()}_petition_index"));
    }

    /**
     * @Route("/delete/{id}", requirements={"id"="\d+"})
     * @ParamConverter("petition", class="CivixCoreBundle:Poll\Question")
     */
    public function deleteAction(Request $request, Petition $petition)
    {
        if ($petition->getUser() !== $this->getUser() || $petition->getPublishedAt() ||
            $request->get('token') !== $this->getToken()) {
            throw new AccessDeniedHttpException();
        }
        $manager = $this->getDoctrine()->getManager();
        $manager->remove($petition);
        $manager->flush();
        $this->get('session')->getFlashBag()->add('notice', 'The petition has been successfully removed');

        return $this->redirect($this->generateUrl("civix_front_{$this->getUser()->getType()}_petition_index"));
    }

    abstract protected function getPetitionClass();
    abstract protected function getPetitionFormClass();

    /**
     * @return string
     */
    protected function getToken()
    {
        return $this->get('form.csrf_provider')->generateCsrfToken('petition');
    }

    protected function isAvailableGroupSection()
    {
        $packLimitState = $this->get('civix_core.package_handler')
            ->getPackageStateForGroupDivisions($this->getUser());

        return $packLimitState->isAllowed();
    }

    protected function isShowGroupSections($petition)
    {
        return ($petition instanceof GroupSectionInterface) &&
            $this->isAvailableGroupSection();
    }
}
