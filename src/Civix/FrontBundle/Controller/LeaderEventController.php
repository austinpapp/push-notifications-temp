<?php

namespace Civix\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Civix\CoreBundle\Model\Group\GroupSectionInterface;
use Civix\CoreBundle\Entity\Poll\Option;
use Civix\CoreBundle\Entity\Poll\Question\LeaderEvent;
use Civix\FrontBundle\Form\Model\LeaderEvent as LeaderEventFormModel;

abstract class LeaderEventController extends Controller
{
    abstract public function getLeaderEventFormClass();

    /**
     * @Route("")
     * @Method({"GET"})
     * @Template("CivixFrontBundle:Event:index.html.twig")
     */
    public function indexAction(Request $request)
    {
        /* @var $repository \Civix\CoreBundle\Repository\Poll\LeaderEventRepository */
        $repository = $this->getDoctrine()->getRepository($this->getClassName());

        $query = $repository->getPublishedLeaderEventQuery($this->getUser());

        $paginator = $this->get('knp_paginator');
        $paginationPublished = $paginator->paginate(
            $query,
            $request->get('page_published', 1),
            10,
            [
                'pageParameterName' => 'page_published',
                'sortDirectionParameterName' => 'dir_published',
                'sortFieldParameterName' => 'sort_published',
            ]
        );

        $query = $repository->getNewLeaderEventQuery($this->getUser());

        $paginationNew = $paginator->paginate(
            $query,
            $request->get('page_new', 1),
            10,
            [
                'pageParameterName' => 'page_new',
                'sortDirectionParameterName' => 'dir_new',
                'sortFieldParameterName' => 'sort_new',
            ]
        );

        return [
            'paginationPublished' => $paginationPublished,
            'paginationNew' => $paginationNew,
            'token' => $this->getToken()
        ];
    }

    /**
     * @Route("/new")
     * @Template("CivixFrontBundle:Event:new.html.twig")
     */
    public function newAction(Request $request)
    {
        $class = $this->getClassName();
        $formClass = $this->getLeaderEventFormClass();
        
        //predefined options
        $optionValues = ['Yes, I will attend', 'No, I will not attend'];
        $leaderEvent = new $class;
        foreach ($optionValues as $optionTitle) {
            $option = new Option();
            $option->setValue($optionTitle);
            $leaderEvent->addOption($option);
        }
        
        $form = $this->createForm(new $formClass($this->getUser()), new LeaderEventFormModel($leaderEvent));

        if ('POST' === $request->getMethod()) {
            if ($form->submit($request)->isValid()) {
                $manager = $this->getDoctrine()->getManager();

                $leaderEvent->setUser($this->getUser());

                /* @var $educationalContext \Civix\FrontBundle\Form\Model\EducationalContext */
                $educationalContext = $form->getData()->getEducationalContext();

                $leaderEvent->clearEducationalContext();

                foreach ($educationalContext->getItems() as $item) {
                    if ($item->getImageFile()) {
                        $this->get('vich_uploader.storage')->upload($item);
                    }
                    /**
                     * @var $entity \Civix\CoreBundle\Entity\Poll\EducationalContext
                     */
                    $entity = $item->createEntity();
                    if ($entity) {
                        $entity->setQuestion($leaderEvent);
                        $manager->persist($entity);
                    }
                }
                foreach ($leaderEvent->getOptions() as $option) {
                    $manager->persist($option);
                }
                $manager->persist($leaderEvent);
                $manager->flush();
                $this->get('session')->getFlashBag()->add('notice', 'The event has been successfully saved');

                return $this->redirect(
                    $this->generateUrl("civix_front_{$this->getUser()->getType()}_leaderevent_index")
                );
            }
        }

        return [
            'form' => $form->createView(),
            'isShowGroupSection' => $this->isShowGroupSections($leaderEvent)
        ];
    }

    /**
     * @Route("/edit/{id}", requirements={"id"="\d+"})
     * @Template("CivixFrontBundle:Event:edit.html.twig")
     */
    public function editAction(Request $request, LeaderEvent $leaderEvent)
    {
        //$leaderEvent = $this->getPaymentRequest($id);
        if ($leaderEvent->getUser() !== $this->getUser() || $leaderEvent->getPublishedAt()) {
            throw $this->createNotFoundException();
        }
        $formClass = $this->getLeaderEventFormClass();

        $form = $this->createForm(new $formClass($this->getUser()), new LeaderEventFormModel($leaderEvent));

        if ('POST' === $request->getMethod()) {
            if ($form->submit($request)->isValid()) {
                $leaderEvent->setUser($this->getUser());
                $manager = $this->getDoctrine()->getManager();

                /* @var $educationalContext \Civix\FrontBundle\Form\Model\EducationalContext */
                $educationalContext = $form->getData()->getEducationalContext();

                $leaderEvent->clearEducationalContext();

                foreach ($educationalContext->getItems() as $item) {
                    if ($item->getImageFile()) {
                        $this->get('vich_uploader.storage')->upload($item);
                    }
                    /**
                     * @var $entity \Civix\CoreBundle\Entity\Poll\EducationalContext
                     */
                    $entity = $item->createEntity();
                    if ($entity) {
                        $entity->setQuestion($leaderEvent);
                        $manager->persist($entity);
                    }
                }

                $manager->persist($leaderEvent);
                $manager->flush();
                $this->get('session')
                    ->getFlashBag()->add('notice', 'The event has been successfully updated');

                return $this->redirect(
                    $this->generateUrl("civix_front_{$this->getUser()->getType()}_leaderevent_index")
                );
            }
        }

        return [
            'form' => $form->createView(),
            'leaderEvent' => $leaderEvent,
            'isShowGroupSection' => $this->isShowGroupSections($leaderEvent)
        ];
    }

    /**
     * @Route("/delete/{id}", requirements={"id"="\d+"})
     */
    public function deleteAction(Request $request, LeaderEvent $leaderEvent)
    {
        if ($leaderEvent->getUser() !== $this->getUser() || $leaderEvent->getPublishedAt() ||
            $request->get('token') !== $this->getToken()) {
            throw new AccessDeniedHttpException();
        }
        $manager = $this->getDoctrine()->getManager();
        $manager->remove($leaderEvent);
        $manager->flush();
        $this->get('session')->getFlashBag()->add('notice', 'The event has been successfully removed');

        return $this->redirect($this->generateUrl("civix_front_{$this->getUser()->getType()}_leaderevent_index"));
    }

    /**
     * @Route("/publish/{id}", requirements={"id"="\d+"})
     */
    public function publishAction(Request $request, LeaderEvent $leaderEvent)
    {
        if ($leaderEvent->getUser() !== $this->getUser()) {
            throw new AccessDeniedHttpException();
        }

        if ($this->getToken() === $request->get('token')) {
            $this->getDoctrine()
                ->getRepository('CivixCoreBundle:HashTag')->addForQuestion($leaderEvent);
            $ignore = new Option();
            $ignore->setValue('Ignore')->setQuestion($leaderEvent);
            $this->getDoctrine()->getManager()->persist($ignore);
            $this->getDoctrine()->getManager()->flush($ignore);

            $result = $this->get('civix_core.activity_update')
                ->publishLeaderEventToActivity($leaderEvent);

            if ($result instanceof Activity) {
                $this->get('session')->getFlashBag()
                    ->add('notice', 'Event has been successfully published');
            } else {
                foreach ($result as $singleError) {
                    $this->get('session')->getFlashBag()->add('error', $singleError->getMessage());
                }
            }
        } else {
            $this->get('session')->getFlashBag()->add('error', 'Something went wrong');
        }

        return $this->redirect($this->generateUrl('civix_front_'.$this->getUser()->getType().'_leaderevent_index'));
    }
    
    protected function getClassName()
    {
        $className = ucfirst($this->getUser()->getType()) . 'Event';

        return "Civix\\CoreBundle\\Entity\\Poll\\Question\\{$className}";
    }
    
    /**
     * @return string
     */
    protected function getToken()
    {
        return $this->get('form.csrf_provider')->generateCsrfToken('leader-event');
    }

    protected function isAvailableGroupSection()
    {
        $packLimitState = $this->get('civix_core.package_handler')
            ->getPackageStateForGroupDivisions($this->getUser());

        return $packLimitState->isAllowed();
    }

    protected function isShowGroupSections($event)
    {
        return ($event instanceof GroupSectionInterface) &&
            $this->isAvailableGroupSection();
    }
}
