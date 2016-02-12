<?php

namespace Civix\CoreBundle\Service\Poll;

use Civix\CoreBundle\Entity\Poll\Answer;
use Civix\CoreBundle\Entity\Poll\Question;
use Civix\CoreBundle\Entity\Poll\Question\Petition;
use Civix\CoreBundle\Entity\User;
use Civix\CoreBundle\Entity\Group;
use Civix\CoreBundle\Entity\Representative;
use Civix\CoreBundle\Entity\Superuser;
use Civix\CoreBundle\Entity\UserGroup;

class AnswerManager
{
    protected $entityManager;

    /**
     * @param ContainerInterface $container
     */
    public function __construct(\Doctrine\ORM\EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function setVisibleAnswersForRecipent(Answer $answer)
    {
        /**
         * @var \Civix\CoreBundle\Entity\Poll\Question $question
         */
        $question = $answer->getQuestion();

        if ($question instanceof \Civix\CoreBundle\Entity\Poll\Question) {
            $specRepresentative = $question->getReportRecipient();
            $offTitleGroup = $question->getReportRecipientGroup();
            //Add specific representative to recipients of this question
            if (isset($specRepresentative)) {
                $question->addRecipient($specRepresentative);
            } elseif (isset($offTitleGroup)) {
                //check if user has representative with recient official title
                $districts = $answer->getUser()->getDistrictsIds();

                //check if user has districts (fill profile info)
                if (!empty($districts)) {
                    $representatives = $this->entityManager->getRepository('CivixCoreBundle:Representative')
                            ->getReprByDistrictsAndOffTitle($districts, $offTitleGroup);

                    //check if base has representatives with selected official title and districts
                    if ($representatives) {
                        foreach ($representatives as $recipient) {
                            if ($question->getUser() != $recipient) {
                                $question->addRecipient($recipient);
                            }
                        }
                    }
                }
            }

            $this->entityManager->persist($question);
            $this->entityManager->flush();
        }
    }

    public function checkAccessAnswer(User $user, Question $question)
    {
        if ($question instanceof Petition && $question->getIsOutsidersSign()) {
            return true;
        }

        $questionOwner = $question->getUser();

        if ($questionOwner instanceof Superuser) {
            return true;
        }

        if ($questionOwner instanceof Group) {
            $userGroup = $this->entityManager->getRepository('CivixCoreBundle:UserGroup')
                ->isJoinedUser($questionOwner, $user);
            
            if ($userGroup instanceof UserGroup &&
                $userGroup->getStatus() == UserGroup::STATUS_ACTIVE
            ) {
                return true;
            }
            
            return false;
        }

        if ($questionOwner instanceof Representative) {
            $userDistricts = $user->getDistrictsIds();

            if (array_search($questionOwner->getDistrictId(), $userDistricts)!==false) {
                return true;
            }

            return false;
        }

        return false;
    }
}
