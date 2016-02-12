<?php

namespace Civix\CoreBundle\Service;

use Civix\CoreBundle\Entity\CheckingLimits;

class QuestionLimit
{
    const QUESTION_LIMIT_ERROR = 'Your limit of questions per month is reached';

    protected $entityManager;
    protected $session;

        /**
     * @param ContainerInterface $container
     */
    public function __construct(\Doctrine\ORM\EntityManager $entityManager, $session)
    {
        $this->entityManager = $entityManager;
        $this->session = $session;

    }

    /**
     * Check  if representative or group may to ask question, set error message in session
     * 
     * @param \Civix\CoreBundle\Entity\CheckingLimits $entityQuestionOwner
     * @return boolean
     */
    public function checkQuestionLimit(CheckingLimits $entityQuestionOwner)
    {
         //check limits of question
        if (!$this->checkLimits($entityQuestionOwner)) {
            $this->session->getFlashBag()->add('error', self::QUESTION_LIMIT_ERROR);

            return false;
        }

        return true;
    }

    /**
     * Check if representative or group may to ask question
     *
     * @param  \Civix\CoreBundle\Entity\CheckingLimits $entityQuestionOwner
     * @return boolean
     */
    public function checkLimits(CheckingLimits $entityQuestionOwner)
    {
        $ownerClass = $this->getClassName($entityQuestionOwner);
        //get current count of question
        $countOfQuestion = $this->entityManager->getRepository('CivixCoreBundle:Poll\Question')
                ->getCountPerMonthQuestionByOwner($entityQuestionOwner, $ownerClass);

        //get current question limit
        $individualQuestionLimit = $entityQuestionOwner->getQuestionLimit();
        //if not set individual question limit, get from default
        if (is_null($individualQuestionLimit)) {
            $individualQuestionLimit = $this->entityManager->getRepository('CivixCoreBundle:QuestionLimit')
                    ->findOneByQuestionType(
                        constant('Civix\CoreBundle\Entity\QuestionLimit::TYPE_QUESTION_' .
                            strtoupper($ownerClass))
                    )
                    ->getQuestionLimit();
        }

        return ($countOfQuestion < $individualQuestionLimit);
    }

    private function getClassName($object)
    {
        $className = '';
        $classPath = get_class($object);

        if ($classPath) {
            $classPathArr = explode('\\', $classPath);
            $className = trim(array_pop($classPathArr));
        }

        return $className;
    }
}
