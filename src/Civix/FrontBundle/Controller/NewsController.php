<?php

namespace Civix\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Civix\FrontBundle\Form\Model\Question as NewsModel;
use Civix\CoreBundle\Model\Group\GroupSectionInterface;

abstract class NewsController extends Controller
{
    abstract public function getNewsFormClass();

    /**
     * @return string
     */
    abstract protected function getToken();
    
    /**
     * @Route("/")
     * @Method({"GET"})
     * @Template()
     */
    public function indexAction(Request $request)
    {
        /* @var $repository \Civix\CoreBundle\Repository\Poll\QuestionRepository */
        $repository = $this->getDoctrine()->getRepository('CivixCoreBundle:Poll\Question');

        $query = $repository->getPublishedLeaderNewsQuery($this->getUser());

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

        $query = $repository->getNewLeaderNewsQuery($this->getUser());

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
            'owner' => $this->getUser()->getType(),
        );
    }

    /**
     * @Route("/details/{id}", requirements={"id"="\d+"})
     * @Method({"GET"})
     * @Template()
     */
    public function detailsAction($id)
    {
        $news = $this->getNews($id);
        $comment = $this->getDoctrine()->getRepository('CivixCoreBundle:Poll\Comment')
            ->findCommentsTreeByQuestion($news);

        return array(
            'comment' => $comment,
            'entity' => $news,
            'owner' => $this->getUser()->getType(),
        );
    }

    /**
     * @Route("/new")
     * @Template()
     */
    public function newAction(Request $request)
    {
        $class = 'Civix\CoreBundle\Entity\Poll\Question\\' . ucfirst($this->getUser()->getType()) . 'News';
        $news = new $class;
        $formClass = $this->getNewsFormClass();
        $form = $this->createForm(new $formClass($this->getUser()), new NewsModel($news));

        if ('POST' === $request->getMethod()) {
            if ($form->submit($request)->isValid()) {
                $manager = $this->getDoctrine()->getManager();

                $news->setUser($this->getUser());

                /* @var $educationalContext \Civix\FrontBundle\Form\Model\EducationalContext */
                $educationalContext = $form->getData()->getEducationalContext();

                $news->clearEducationalContext();

                foreach ($educationalContext->getItems() as $item) {
                    if ($item->getImageFile()) {
                        $this->container->get('vich_uploader.storage')->upload($item);
                    }
                    /**
                     * @var $entity \Civix\CoreBundle\Entity\Poll\EducationalContext
                     */
                    $entity = $item->createEntity();
                    if ($entity) {
                        $entity->setQuestion($news);
                        $manager->persist($entity);
                    }
                }

                $manager->persist($news);
                $manager->flush();
                $this->get('session')->getFlashBag()->add('notice', 'The news has been successfully saved');

                return $this->redirect(
                    $this->generateUrl('civix_front_' . $this->getUser()->getType() . '_news_index')
                );
            }
        }

        return array(
            'form' => $form->createView(),
            'owner' => $this->getUser()->getType(),
            'isShowGroupSection' => $this->isShowGroupSections($news)
        );
    }

    /**
     * @Route("/edit/{id}", requirements={"id"="\d+"})
     * @Template()
     */
    public function editAction(Request $request, $id)
    {
        $news = $this->getNews($id);
        if ($news->getUser() !== $this->getUser() || $news->getPublishedAt()) {
            throw $this->createNotFoundException();
        }

        $formClass = $this->getNewsFormClass();
        $form = $this->createForm(new $formClass($this->getUser()), new NewsModel($news));

        if ('POST' === $request->getMethod()) {
            if ($form->submit($request)->isValid()) {
                $news->setUser($this->getUser());
                $manager = $this->getDoctrine()->getManager();

                /* @var $educationalContext \Civix\FrontBundle\Form\Model\EducationalContext */
                $educationalContext = $form->getData()->getEducationalContext();

                $news->clearEducationalContext();

                foreach ($educationalContext->getItems() as $item) {
                    if ($item->getImageFile()) {
                        $this->container->get('vich_uploader.storage')->upload($item);
                    }
                    /**
                     * @var $entity \Civix\CoreBundle\Entity\Poll\EducationalContext
                     */
                    $entity = $item->createEntity();
                    if ($entity) {
                        $entity->setQuestion($news);
                        $manager->persist($entity);
                    }
                }

                $manager->persist($news);
                $manager->flush();
                $this->get('session')->getFlashBag()->add('notice', 'The news has been successfully updated');

                return $this->redirect(
                    $this->generateUrl('civix_front_' . $this->getUser()->getType() . '_news_index')
                );
            }
        }

        return array(
            'form' => $form->createView(),
            'news' => $news,
            'owner' => $this->getUser()->getType(),
            'isShowGroupSection' => $this->isShowGroupSections($news)
        );
    }

    /**
     * @Route("/delete/{id}", requirements={"id"="\d+"})
     */
    public function deleteAction(Request $request, $id)
    {
        $news = $this->getNews($id);
        if ($news->getUser() !== $this->getUser() || $news->getPublishedAt() ||
            $request->get('token') !== $this->getToken()) {
            throw new AccessDeniedHttpException();
        }
        $manager = $this->getDoctrine()->getManager();
        $manager->remove($news);
        $manager->flush();
        $this->get('session')->getFlashBag()->add('notice', 'The news has been successfully removed');

        return $this->redirect($this->generateUrl('civix_front_' . $this->getUser()->getType() . '_news_index'));
    }

    /**
     * @Route("/publish/{id}", requirements={"id"="\d+"})
     */
    public function publishAction(Request $request, $id)
    {
        $news = $this->getNews($id);
        if ($news->getUser() !== $this->getUser() || $news->getPublishedAt() ||
            $request->get('token') !== $this->getToken()) {
            throw new AccessDeniedHttpException();
        }
        $news->setPublishedAt(new \DateTime());
        $this->getDoctrine()->getManager()->flush();
        $this->get('civix_core.activity_update')->publishLeaderNewsToActivity($news);
        $this->get('session')->getFlashBag()->add('notice', 'The news has been successfully published');

        return $this->redirect($this->generateUrl('civix_front_' . $this->getUser()->getType() . '_news_index'));
    }

    /**
     * @param $id
     * @return LeaderNews
     */
    protected function getNews($id)
    {
        $className = ucfirst($this->getUser()->getType()) . 'News';
        $news = $this->getDoctrine()->getRepository("CivixCoreBundle:Poll\\Question\\{$className}")->find($id);
        if (!$news) {
            throw $this->createNotFoundException();
        }

        return $news;
    }

    protected function isAvailableGroupSection()
    {
        $packLimitState = $this->get('civix_core.package_handler')
            ->getPackageStateForGroupDivisions($this->getUser());

        return $packLimitState->isAllowed();
    }

    protected function isShowGroupSections($news)
    {
        return ($news instanceof GroupSectionInterface) &&
            $this->isAvailableGroupSection();
    }
}
