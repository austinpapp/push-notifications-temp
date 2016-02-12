<?php

namespace Civix\CoreBundle\Service\Poll;

use Civix\CoreBundle\Entity\Poll\Question;
use Civix\CoreBundle\Entity\Poll\Question\RepresentativeNews;
use Civix\CoreBundle\Model\Group\GroupSectionInterface;
use Civix\CoreBundle\Service\PushSender;

class QuestionUserPush
{
    protected $entityManager;
    private $question;
    private $questionOwner;

    public function __construct(\Doctrine\ORM\EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function setQuestion(Question $question)
    {
        $this->question = $question;
        $this->questionOwner = $this->getClassName($question->getUser());
    }

    public function getUsersForPush($startId, $limitUser)
    {
        $users = array();
        $methodName = 'getUsersBy'.$this->questionOwner;
        
        if (method_exists($this, $methodName)) {
            $users = $this->$methodName($startId, $limitUser);
        }

        return $users;
    }

    private function getUsersByRepresentative($startId, $limitUser)
    {
        return $this->entityManager
            ->getRepository('CivixCoreBundle:User')
            ->getUsersByDistrictForPush(
                $this->question->getUser()->getDistrictId(),
                ($this->question instanceof RepresentativeNews)?
                PushSender::TYPE_PUSH_NEWS:
                PushSender::TYPE_PUSH_ACTIVITY,
                $startId,
                $limitUser
            );
    }

    private function getUsersByGroup($startId, $limitUser)
    {
        if (($this->question instanceof GroupSectionInterface) &&
            $this->question->getGroupSections()->count()>0
        ) {
            return $this->entityManager
                ->getRepository('CivixCoreBundle:User')
                ->getUsersBySectionsForPush(
                    $this->question->getGroupSectionIds(),
                    PushSender::TYPE_PUSH_ACTIVITY,
                    $startId,
                    $limitUser
                );
        } else {
            return $this->entityManager
                ->getRepository('CivixCoreBundle:User')
                ->getUsersByGroupForPush(
                    $this->question->getUser()->getId(),
                    PushSender::TYPE_PUSH_ACTIVITY,
                    $startId,
                    $limitUser
                );
        }

    }

    private function getUsersBySuperuser($startId, $limitUser)
    {
        return $this->entityManager
            ->getRepository('CivixCoreBundle:User')
            ->getAllUsersForPush($startId, $limitUser);
    }

    private function getClassName($object)
    {
        $className = explode('\\', get_class($object));

        return $className[count($className)-1];
    }
}
