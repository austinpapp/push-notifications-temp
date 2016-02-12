<?php

namespace Civix\CoreBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * Default question's limit for representative and group
 *
 * @ORM\Entity
 * @ORM\Table(name="question_limits")
 */
class QuestionLimit
{

    const TYPE_QUESTION_REPRESENTATIVE = 1;
    const TYPE_QUESTION_GROUP = 2;

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="smallint", unique=true)
     * @var type
     */
    protected $questionType;

    protected $questionTypeName;

    /**
     * @Assert\Regex(
     *      pattern="/^\d+$/",
     *      message="The value cannot contain a non-numerical symbols"
     * )
     * @ORM\Column(type="integer")
     * @var Integer
     */
    protected $questionLimit;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set questionType
     *
     * @param  integer       $questionType
     * @return QuestionLimit
     */
    public function setQuestionType($questionType)
    {
        $this->questionType = $questionType;

        return $this;
    }

    /**
     * Get questionType
     *
     * @return integer
     */
    public function getQuestionType()
    {
        return $this->questionType;
    }

    /**
     * Set limitValue
     *
     * @param  integer       $limitValue
     * @return QuestionLimit
     */
    public function setQuestionLimit($limitValue)
    {
        $this->questionLimit = $limitValue;

        return $this;
    }

    /**
     * Get limitValue
     *
     * @return integer
     */
    public function getQuestionLimit()
    {
        return $this->questionLimit;
    }

    public function getQuestionTypeName()
    {
        if ($this->questionType == self::TYPE_QUESTION_REPRESENTATIVE) {
            return 'Representative';
        } elseif ($this->questionType == self::TYPE_QUESTION_GROUP) {
            return 'Group';
        }
    }
}
