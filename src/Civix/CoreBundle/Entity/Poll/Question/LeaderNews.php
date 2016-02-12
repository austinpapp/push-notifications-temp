<?php

namespace Civix\CoreBundle\Entity\Poll\Question;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\ExecutionContextInterface;
use Civix\CoreBundle\Entity\Poll\Question;
use JMS\Serializer\Annotation as Serializer;

/**
 *
 * @Assert\Callback(methods={"isSubjectValid"})
 * @Serializer\ExclusionPolicy("all")
 */
abstract class LeaderNews extends Question
{
    /**
     * @var string
     *
     * @ORM\Column(name="subject_parsed", type="text", nullable=true)
     * @Serializer\Expose()
     * @Serializer\Groups({"api-poll", "api-leader-poll"})
     */
    protected $subjectParsed;

    /**
     * Set subjectParsed
     *
     * @param string $subjectParsed
     * @return $this
     */
    public function setSubjectParsed($subjectParsed)
    {
        $this->subjectParsed = $subjectParsed;
    
        return $this;
    }

    /**
     * Get subjectParsed
     *
     * @return string 
     */
    public function getSubjectParsed()
    {
        return $this->subjectParsed;
    }

    /**
     * @param string $subject
     * @return $this
     */
    public function setSubject($subject)
    {
        parent::setSubject($subject);
        $this->setSubjectParsed(\Civix\CoreBundle\Parser\UrlConverter::convert($subject));

        return $this;
    }

    public function isSubjectValid(ExecutionContextInterface $context)
    {
        $text = preg_replace(array('/<a[^>]+href[^>]+>/', '/<\/a>/'), '', $this->subjectParsed);

        if (mb_strlen($text, 'utf-8') > 500) {
            $context->addViolationAt('subject', 'The subject too long');
        }
    }
}
