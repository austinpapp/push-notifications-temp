<?php

namespace Civix\CoreBundle\DataFixtures\ORM\Limits;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Civix\CoreBundle\Entity\QuestionLimit;

/**
 *
 *
 */
class LoadQuestionLimitData implements FixtureInterface, ContainerAwareInterface
{
    const DEFAULT_QUESTION_LIMIT = 20;
     /**
     * @var ContainerInterface
     */
    private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {
        $limitReprObj = $this->createLimit(self::DEFAULT_QUESTION_LIMIT,
            QuestionLimit::TYPE_QUESTION_REPRESENTATIVE);
        $manager->persist($limitReprObj);

        $limitGroupObj = $this->createLimit(self::DEFAULT_QUESTION_LIMIT,
            QuestionLimit::TYPE_QUESTION_GROUP);
        $manager->persist($limitGroupObj);

        $manager->flush();
    }

    /**
     * Create Question's limit Object
     *
     * @param integer $limitValue
     * @param integer $type
     * 
     * @return \Civix\CoreBundle\Entity\QuestionLimit
     */
    private function createLimit($limitValue, $type)
    {
        $limitObj = new QuestionLimit();
        $limitObj->setQuestionLimit($limitValue);
        $limitObj->setQuestionType($type);

        return $limitObj;
    }
}
