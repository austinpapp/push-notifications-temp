<?php

namespace Civix\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Civix\FrontBundle\Form\Type\Announcement as AnnouncementFormType;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Civix\CoreBundle\Entity\Announcement;

abstract class AnnouncementController extends Controller
{
    abstract protected function getAnnouncementClass();
    
    abstract protected function getSendPushMethodName();

    /**
     * @Route("")
     * @Method({"GET"})
     * @Template("CivixFrontBundle:Announcement:index.html.twig")
     */
    public function indexAction(Request $request)
    {       
        /* @var $announcementRepository \Civix\CoreBundle\Repository\AnnouncementRepository */
        $announcementRepository = $this->getDoctrine()->getRepository('CivixCoreBundle:Announcement');

        $query = $announcementRepository->getPublishedQuery($this->getUser());

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

        $query = $announcementRepository->getNewQuery($this->getUser());

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
        );
    }

    /**
     * @Route("/new")
     * @Template("CivixFrontBundle:Announcement:new.html.twig")
     */
    public function newAction(Request $request)
    {
        $class = $this->getAnnouncementClass();
        $announcement = new $class();
        $form = $this->createForm(new AnnouncementFormType, $announcement);

        if ('POST' === $request->getMethod()) {
            if ($form->bind($request)->isValid()) {
                /* @var $announcement \Civix\CoreBundle\Entity\Announcement */
                $announcement = $form->getData();
                $announcement->setUser($this->getUser());
                $manager = $this->getDoctrine()->getManager();
                $manager->persist($announcement);
                $manager->flush();

                return $this->redirect($this->generateUrl(
                    'civix_front_'.$this->getUser()->getType().'_announcement_index')
                );
            }
        }

        return array(
            'form' => $form->createView()
        );
    }

    /**
     * @Route("/edit/{id}", requirements={"id"="\d+"})
     * @ParamConverter("announcement", class="CivixCoreBundle:Announcement")
     * @Template("CivixFrontBundle:Announcement:edit.html.twig")
     */
    public function editAction(Request $request, Announcement $announcement)
    {
        if ($announcement->getUser() !== $this->getUser() || $announcement->getPublishedAt()) {
            throw $this->createNotFoundException();
        }
        
        $form = $this->createForm(new AnnouncementFormType, $announcement);

        if ('POST' === $request->getMethod()) {
            if ($form->bind($request)->isValid()) {
                $announcement->setUser($this->getUser());
                $manager = $this->getDoctrine()->getManager();
                $manager->persist($announcement);
                $manager->flush();

                return $this->redirect($this->generateUrl(
                    'civix_front_'.$this->getUser()->getType().'_announcement_index')
                );
            }
        }

        return array(
            'form' => $form->createView(),
            'announcement' => $announcement
        );
    }

    /**
     * @Route("/delete/{id}", requirements={"id"="\d+"})
     */
    public function deleteAction(Request $request, Announcement $announcement)
    {
        if ($announcement->getUser() !== $this->getUser() || $announcement->getPublishedAt() ||
            $request->get('token') !== $this->getToken()) {
            throw new AccessDeniedHttpException();
        }
        $manager = $this->getDoctrine()->getManager();
        $manager->remove($announcement);
        $manager->flush();
        $this->get('session')->getFlashBag()->add('notice', 'Announcement has been successfully removed');

        return $this->redirect($this->generateUrl('civix_front_'.$this->getUser()->getType().'_announcement_index'));
    }
    
    /**
     * @Route("/publish/{id}", requirements={"id"="\d+"})
     */
    public function publishAction(Request $request, Announcement $announcement)
    {
        if ($announcement->getUser() !== $this->getUser() || $announcement->getPublishedAt() ||
            $request->get('token') !== $this->getToken()) {
            throw new AccessDeniedHttpException();
        }
        
        $packLimitState = $this->get('civix_core.package_handler')
            ->getPackageStateForAnnouncement($this->getUser());
        
        if ($packLimitState->isAllowedWith()) {
            $announcement->setPublishedAt(new \DateTime());
            $this->getDoctrine()->getManager()->flush();
            $this->get('civix_core.push_task')->addToQueue(
                $this->getSendPushMethodName(),
                [$announcement->getUser()->getId(), $announcement->getContent()]
            );
            $this->get('session')->getFlashBag()->add('success', 'Announcement has been successfully published');
        } else {
            $this->get('session')->getFlashBag()->add('danger', 'Announcements\' limit has been exceeded');
        }

        return $this->redirect($this->generateUrl('civix_front_'.$this->getUser()->getType().'_announcement_index'));
    }
    
    /**
     * @return string
     */
    protected function getToken()
    {
        return $this->get('form.csrf_provider')->generateCsrfToken('announcements');
    }
}
