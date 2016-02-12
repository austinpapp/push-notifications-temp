<?php

namespace Civix\ApiBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Civix\CoreBundle\Model\Comment\CommentModelFactory;
use Civix\CoreBundle\Model\Comment\CommentModelInterface;
use Civix\CoreBundle\Entity\Poll\Question\LeaderNews;
use Civix\CoreBundle\Entity\Poll\Question;
use Civix\CoreBundle\Entity\Micropetitions;

class CommentController extends BaseController
{
    /**
     * Get list comments
     * 
     * @Route(
     *      "/{typeEntity}/{entityId}/comments/",
     *      requirements={"entityId"="\d+", "typeEntity" = "poll|micro-petitions"},
     *      name="api_comments"
     * )
     * @Method("GET")
     * @ParamConverter(
     *      "commentModel",
     *      class="Civix\CoreBundle\Model\Comment\CommentModelInterface",
     *      options={"typeEntity":"typeEntity"}
     * )
     * @ApiDoc(
     *     resource=true,
     *     description="Get comments (polls or micropetitions)",
     *     statusCodes={
     *         200="Returns comments",
     *         401="Authorization required",
     *         405="Method Not Allowed"
     *     }
     * )
     */
    public function getCommentsAction(CommentModelInterface $commentModel, $entityId, Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();

        if ($request->query->has('root')) {
            $comments = $entityManager
                ->getRepository($commentModel->getRepositoryName())
                ->getRootCommentByEntityId($entityId);
        } else {
            $comments = $entityManager
                ->getRepository($commentModel->getRepositoryName())
                ->getCommentsByEntityId($entityId, $this->getUser());
        }

        $response = new Response($this->jmsSerialization($comments, ['api-comments', 'api-comments-parent']));
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    /**
     * Add comment
     * 
     * @Route(
     *      "/{typeEntity}/{entityId}/comments/",
     *      requirements={"entityId"="\d+", "typeEntity" = "poll|micro-petitions"},
     *      name="api_comments_add"
     * )
     * @Method("POST")
     * @ParamConverter(
     *      "commentModel",
     *      class="Civix\CoreBundle\Model\Comment\CommentModelInterface",
     *      options={"typeEntity":"typeEntity"}
     * )
     * @ApiDoc(
     *     resource=true,
     *     description="Add comment (polls or micropetitions)",
     *     statusCodes={
     *         200="Returns created comment",
     *         401="Authorization required",
     *         405="Method Not Allowed"
     *     }
     * )
     */
    public function addCommentAction(Request $request, CommentModelInterface $commentModel, $entityId)
    {
        $entityManager = $this->getDoctrine()->getManager();
        /* @var \Civix\CoreBundle\Entity\BaseComment $comment */
        $comment = $this->jmsDeserialization(
            $request->getContent(),
            $commentModel->getRepositoryName(),
            ['api-comments-add', 'api-comments-parent']
        );
        
        $parentComment = $entityManager
            ->getRepository($commentModel->getRepositoryName())
            ->find($comment->getParentComment());

        if (is_null($parentComment)) {
            throw new BadRequestHttpException('Incorrect parent comment');
        }
        
        $entityForComment = $commentModel->getEntityForComment($parentComment);
        if ($entityForComment->getId() != $entityId) {
            throw new NotFoundHttpException('Not found');
        }
        $errors = $this->getValidator()->validate($comment);
        if (count($errors) > 0) {
            throw new BadRequestHttpException(json_encode(['errors' => $this->transformErrors($errors)]));
        }
        $comment->setParentComment($parentComment);
        $comment->setUser($this->getUser());
        $commentModel->setEntityForComment($entityForComment, $comment);
        
        $this->get('civix_core.poll.comment_manager')->addComment($comment);

        if ($entityForComment instanceof LeaderNews) {
            $this->get('civix_core.activity_update')->updateResponsesQuestion($entityForComment);
        }
        if ($comment instanceof \Civix\CoreBundle\Entity\Poll\Comment) {
            $this->get('civix_core.social_activity_manager')->noticePollCommented($comment);
        } else if ($comment instanceof Micropetitions\Comment) {
            $this->get('civix_core.social_activity_manager')->noticeMicropetitionCommented($comment);
        }

        $this->get('civix_core.content_manager')->handleCommentContent($comment);

        $response = new Response($this->jmsSerialization(
            $comment,
            ['api-comments', 'api-comments-parent']
        ));

        return $response;
    }
    
    /**
     * Get question comments
     *
     * @Route(
     *      "/poll/comments/{questionId}",
     *      requirements={"questionId"="\d+"},
     *      name="api_question_comments"
     * )
     * @Method("GET")
     * @ApiDoc(
     *     resource=true,
     *     description="Get question comments",
     *     deprecated=true,
     *     statusCodes={
     *         200="Returns comments",
     *         401="Authorization required",
     *         405="Method Not Allowed"
     *     }
     * )
     * @deprecated Use getCommentsAction
     */
    public function commentsByQuestionAction($questionId)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $comments = $entityManager
            ->getRepository('CivixCoreBundle:Poll\Comment')
            ->getCommentsByEntityId($questionId, $this->getUser());

        $response = new Response($this->jmsSerialization($comments, ['api-comments', 'api-comments-parent']));
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    /**
     * Add question comments
     *
     * @Route(
     *      "/poll/comments/add/{id}",
     *      requirements={"id"="\d+"},
     *      name="api_question_add_comment"
     * )
     * @ParamConverter("question", class="CivixCoreBundle:Poll\Question")
     * @Method("POST")
     * @ApiDoc(
     *     resource=true,
     *     description="Add comment to question",
     *     deprecated=true,
     *     statusCodes={
     *         200="Returns comments",
     *         401="Authorization required",
     *         405="Method Not Allowed"
     *     }
     * )
     * @deprecated Use getCommentsAction
     */
    public function addCommentToQuestion(Request $request, \Civix\CoreBundle\Entity\Poll\Question $question)
    {
        $entityManager = $this->getDoctrine()->getManager();

        /* @var \Civix\CoreBundle\Entity\Poll\Comment $comment */
        $comment = $this->jmsDeserialization(
            $request->getContent(),
            'Civix\CoreBundle\Entity\Poll\Comment',
            ['api-comments-add', 'api-comments-parent']
        );

        $parentComment = $entityManager
            ->getRepository('CivixCoreBundle:Poll\Comment')
            ->find($comment->getParentComment());

        if (is_null($parentComment)) {
            throw new BadRequestHttpException('Incorrect parent comment');
        }

        $comment->setParentComment($parentComment);
        $comment->setUser($this->getUser());
        $comment->setQuestion($question);

        $entityManager->persist($comment);
        $entityManager->flush();
        if ($question instanceof LeaderNews) {
            $this->get('civix_core.activity_update')->updateResponsesQuestion($question);
        }

        $response = new Response($this->jmsSerialization($comment, ['api-comments', 'api-comments-parent']));

        return $response;
    }
}
