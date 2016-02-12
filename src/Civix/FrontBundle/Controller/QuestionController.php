<?php

namespace Civix\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Civix\FrontBundle\Form\Model\Question as QuestionModel;
use Civix\CoreBundle\Entity\Poll\Question;
use Civix\CoreBundle\Entity\Activity;
use Civix\CoreBundle\Model\Group\GroupSectionInterface;
use Civix\CoreBundle\Service\Settings;

abstract class QuestionController extends Controller
{
    abstract public function getQuestionClass();
    abstract public function getQuestionFormClass();
    abstract public function isCanPublishQuestion();

    /**
     * @Route("")
     * @Method({"GET"})
     * @Template("CivixFrontBundle:Question:index.html.twig")
     */
    public function indexAction()
    {
        /** @var $query \Doctrine\ORM\Query */
        $query = $this->getDoctrine()->getRepository('CivixCoreBundle:Poll\Question')
            ->getUnPublishedQuestionQuery($this->getUser(), $this->getQuestionClass());

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query,
            $this->getRequest()->get('page', 1),
            20
        );

        return [
            'pagination' => $pagination,
            'token' => $this->getToken()
        ];
    }

    /**
     * @Route("/sending-out-response")
     * @Method({"GET"})
     * @Template("CivixFrontBundle:Question:response.html.twig")
     */
    public function responseAction()
    {
        /** @var $query \Doctrine\ORM\Query */
        $query = $this->getDoctrine()->getRepository('CivixCoreBundle:Poll\Question')
            ->getSendingOutQuestionQuery($this->getUser(), $this->getQuestionClass());

        $pagination = $this->get('knp_paginator')->paginate(
            $query,
            $this->getRequest()->get('page', 1),
            20
        );

        return [
            'pagination' => $pagination,
            'token' => $this->getToken()
        ];
    }

    /**
     * @Route("/archive")
     * @Method({"GET"})
     * @Template("CivixFrontBundle:Question:archive.html.twig")
     */
    public function archiveAction()
    {
        $query = $this->getDoctrine()->getRepository('CivixCoreBundle:Poll\Question')
            ->getArchiveQuestionQuery($this->getUser(), $this->getQuestionClass());

        $pagination = $this->get('knp_paginator')->paginate(
            $query,
            $this->getRequest()->get('page', 1),
            20
        );

        return [
            'pagination' => $pagination,
            'token' => $this->getToken()
        ];
    }
    
    /**
     * @Route("/new")
     * @Template("CivixFrontBundle:Question:new.html.twig")
     */
    public function newAction(Request $request)
    {
        $questionClass = $this->getQuestionClass();
        $questionFormClass = $this->getQuestionFormClass();
        $question = new $questionClass;
        $questionForm = $this->createForm(new $questionFormClass($this->getDoctrine(),
            $this->getUser()), new QuestionModel($question)
        );

        if ('POST' === $request->getMethod()) {
            $questionForm->handleRequest($this->getRequest());
            if ($questionForm->isValid()) {
                $question->setUser($this->getUser());

                $entityManager = $this->getDoctrine()->getManager();
                foreach ($question->getOptions() as $option) {
                    $entityManager->persist($option);
                }

                /**
                 * @var $educationalContext \Civix\FrontBundle\Form\Model\EducationalContext
                 */
                $educationalContext = $questionForm->getData()->getEducationalContext();
                $question->clearEducationalContext();
                
                foreach ($educationalContext->getItems() as $item) {
                    if ($item->getImageFile()) {
                        $this->container->get('vich_uploader.storage')->upload($item);
                    }
                    /**
                     * @var $entity \Civix\CoreBundle\Entity\Poll\EducationalContext
                     */
                    $entity = $item->createEntity();
                    if ($entity) {
                        $entity->setQuestion($question);
                        $entityManager->persist($entity);
                    }
                }

                $entityManager->persist($question);
                $entityManager->flush();

                $this->get('session')->getFlashBag()->add('notice', 'Question has been successfully saved');

                return $this->redirect(
                    $this->generateUrl('civix_front_'.$this->getUser()->getType().'_question_index')
                );
            }
        }
        
        return [
            'questionForm' => $questionForm->createView(),
            'isShowGroupSection' => $this->isShowGroupSections($question)
        ];
    }

     /**
     * @Route("/edit/{id}", requirements={"id"="\d+"})
     * @ParamConverter("question", class="CivixCoreBundle:Poll\Question")
     * @Template("CivixFrontBundle:Question:edit.html.twig")
     */
    public function editAction(Request $request, Question $question)
    {
        $questionFormClass = $this->getQuestionFormClass();
        $entityManager = $this->getDoctrine()->getManager();
        if ($question->getUser() !== $this->getUser()) {
            throw new AccessDeniedHttpException();
        }

        $questionForm = $this->createForm(new $questionFormClass($this->getDoctrine(),
            $this->getUser()), new QuestionModel($question)
        );
        
        if ('POST' === $request->getMethod()) {
            $optionForRemove = $question->getOptions()->toArray();

            $questionForm->handleRequest($request);
            if ($questionForm->isValid()) {
                // filter $optionForRemove to contain Option no longer present
                foreach ($question->getOptions() as $option) {
                    foreach ($optionForRemove as $key => $forRemove) {
                        if ($forRemove->getId() === $option->getId()) {
                            unset($optionForRemove[$key]);
                        }
                    }
                }
                // remove no longer present options
                foreach ($optionForRemove as $option) {
                    $entityManager->remove($option);
                }
                foreach ($question->getOptions() as $option) {
                    $entityManager->persist($option);
                }
                $educationalContext = $questionForm->getData()->getEducationalContext();

                $question->clearEducationalContext();

                foreach ($educationalContext->getItems() as $item) {
                    if ($item->getImageFile()) {
                        $this->container->get('vich_uploader.storage')->upload($item);
                    }
                    /**
                     * @var $entity \Civix\CoreBundle\Entity\Poll\EducationalContext
                     */
                    $entity = $item->createEntity();
                    if ($entity) {
                        $entity->setQuestion($question);
                        $entityManager->persist($entity);
                    }
                }

                $entityManager->persist($question);
                $entityManager->flush();

                $this->get('session')->getFlashBag()->add('notice', 'Question has been successfully updated');

                return $this->redirect(
                    $this->generateUrl('civix_front_'.$this->getUser()->getType().'_question_index')
                );
            }
        }

        return [
            'questionForm' => $questionForm->createView(),
            'isShowGroupSection' => $this->isShowGroupSections($question)
        ];
    }

    /**
     * @Route("/publish/{id}", requirements={"id"="\d+"})
     * @ParamConverter("question", class="CivixCoreBundle:Poll\Question")
     */
    public function publishAction(Request $request, Question $question)
    {
        //check limits of question
        if (!$this->isCanPublishQuestion()) {
            return $this->redirect($this->generateUrl('civix_front_'.$this->getUser()->getType().'_question_index'));
        }
        if ($question->getUser() !== $this->getUser()) {
            throw new AccessDeniedHttpException();
        }

        if ($this->getToken() === $request->get('token')) {
            $this->getDoctrine()
                ->getRepository('CivixCoreBundle:HashTag')->addForQuestion($question);
            $expireDate = new \DateTime();
            $expireDate->add(
                new \DateInterval('P' . $this->get('civix_core.settings')->get(Settings::POLL_EXPIRE_INTERVAL)
                        ->getValue() . 'D')
            );
            $question->setExpireAt($expireDate);

            $result = $this->get('civix_core.activity_update')->publishQuestionToActivity($question);

            if ($result instanceof Activity) {
                $this->get('session')->getFlashBag()->add('notice', 'Question has been successfully published');
            } else {
                foreach ($result as $singleError) {
                    $this->get('session')->getFlashBag()->add('error', $singleError->getMessage());
                }
            }
        } else {
            $this->get('session')->getFlashBag()->add('error', 'Something went wrong');
        }

        return $this->redirect($this->generateUrl('civix_front_'.$this->getUser()->getType().'_question_index'));
    }

    /**
     * @Route("/delete/{id}", requirements={"id"="\d+"})
     * @ParamConverter("question", class="CivixCoreBundle:Poll\Question")
     */
    public function deleteAction(Request $request, Question $question)
    {
        $entityManager = $this->getDoctrine()->getManager();

        if ($question->getUser() !== $this->getUser()) {
            throw new AccessDeniedHttpException();
        }

        if (($this->getToken() ===  $request->get('token')) && ($question->getPublishedAt() === null)) {
            $entityManager->remove($question);
            $entityManager->flush();

            $this->get('session')->getFlashBag()->add('notice', 'Question has been successfully removed');
        } else {
            $this->get('session')->getFlashBag()->add('error', 'Something went wrong');
        }

        return $this->redirect($this->generateUrl('civix_front_'.$this->getUser()->getType().'_question_index'));
    }

    /**
     * @Route("/details/{id}", requirements={"id"="\d+"})
     * @ParamConverter("question", class="CivixCoreBundle:Poll\Question")
     * @Template("CivixFrontBundle:Question:details.html.twig")
     */
    public function detailsAction(Request $request, Question $question)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $statistics = $question->getStatistic(['#7ac768', '#ba3830', '#4fb0f3', '#dbfa08', '#08fac4']);

        $query = $entityManager->getRepository('CivixCoreBundle:Poll\Answer')
            ->getAnswersByQuestion($question->getId());

        $pagination = $this->get('knp_paginator')->paginate(
            $query,
            $this->getRequest()->get('page', 1),
            20
        );

        return [
            'statistics' => $statistics,
            'pagination' => $pagination
        ];
    }
    
    /**
     * @return string
     */
    protected function getToken()
    {
        return $this->get('form.csrf_provider')->generateCsrfToken('question');
    }

    protected function isAvailableGroupSection()
    {
        $packLimitState = $this->get('civix_core.package_handler')
            ->getPackageStateForGroupDivisions($this->getUser());

        return $packLimitState->isAllowed();
    }

    protected function isShowGroupSections($question)
    {
        return ($question instanceof GroupSectionInterface) &&
            $this->isAvailableGroupSection();
    }
}
