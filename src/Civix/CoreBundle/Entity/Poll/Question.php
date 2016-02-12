<?php

namespace Civix\CoreBundle\Entity\Poll;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping\InheritanceType;
use Doctrine\ORM\Mapping\DiscriminatorColumn;
use Doctrine\ORM\Mapping\DiscriminatorMap;
use JMS\Serializer\Annotation as Serializer;
use Civix\CoreBundle\Serializer\Type\Image;
use Civix\CoreBundle\Entity\Representative;

/**
 * Question entity
 *
 * @ORM\Table(name="poll_questions")
 * @ORM\Entity(repositoryClass="Civix\CoreBundle\Repository\Poll\QuestionRepository")
 * @ORM\HasLifecycleCallbacks
 * @InheritanceType("SINGLE_TABLE")
 * @DiscriminatorColumn(name="type", type="string")
 * @DiscriminatorMap({
 *      "group" = "Civix\CoreBundle\Entity\Poll\Question\Group",
 *      "representative" = "Civix\CoreBundle\Entity\Poll\Question\Representative",
 *      "superuser" = "Civix\CoreBundle\Entity\Poll\Question\Superuser",
 *      "representative_news" = "Civix\CoreBundle\Entity\Poll\Question\RepresentativeNews",
 *      "group_news" = "Civix\CoreBundle\Entity\Poll\Question\GroupNews",
 *      "representative_petition" = "Civix\CoreBundle\Entity\Poll\Question\RepresentativePetition",
 *      "group_petition" = "Civix\CoreBundle\Entity\Poll\Question\GroupPetition",
 *      "petition" = "Civix\CoreBundle\Entity\Poll\Question\Petition",
 *      "payment_request" = "Civix\CoreBundle\Entity\Poll\Question\PaymentRequest",
 *      "representative_payment_request" = "Civix\CoreBundle\Entity\Poll\Question\RepresentativePaymentRequest",
 *      "group_payment_request" = "Civix\CoreBundle\Entity\Poll\Question\GroupPaymentRequest",
 *      "leader_event" = "Civix\CoreBundle\Entity\Poll\Question\LeaderEvent",
 *      "representative_event" = "Civix\CoreBundle\Entity\Poll\Question\RepresentativeEvent",
 *      "group_event" = "Civix\CoreBundle\Entity\Poll\Question\GroupEvent"
 * })
 * @Serializer\ExclusionPolicy("all")
 */
abstract class Question
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Serializer\Expose()
     * @Serializer\Groups({"api-poll", "api-answers-list", "api-poll-public", "api-leader-poll"})
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="subject", type="text", nullable=true)
     * @Assert\NotBlank()
     * @Serializer\Expose()
     * @Serializer\Groups({"api-poll", "api-poll-public", "api-leader-poll"})
     */
    private $subject;

    /**
     * @ORM\OneToMany(
     *      targetEntity="Option",
     *      mappedBy="question",
     *      cascade={"persist"},
     *      orphanRemoval=true
     * )
     * @Assert\Count(
     *      min = "2",
     *      minMessage = "You must specify at least two options",
     *      groups = {"publish"}
     * )
     * @Serializer\Expose()
     * @Serializer\Groups({"api-poll", "api-poll-public", "api-leader-poll"})
     */
    protected $options;

    /**
     * @ORM\OneToMany(
     *      targetEntity="Answer",
     *      mappedBy="question",
     *      cascade={"remove", "persist"},
     *      orphanRemoval=true
     * )
     */
    private $answers;

    /**
     * @Serializer\Expose()
     * @Serializer\Groups({"api-poll", "api-poll-public"})
     *
     * @ORM\OneToMany(
     *      targetEntity="EducationalContext", 
     *      mappedBy="question", 
     *      cascade={"remove", "persist"},
     *      orphanRemoval=true
     * )
     */
    private $educationalContext;

    /**
     * @var \DateTime $createdAt
     *
     * @ORM\Column(name="created_at", type="datetime")
     * @Serializer\Expose()
     * @Serializer\Groups({"api-poll", "api-poll-public", "api-leader-poll"})
     * @Serializer\Type("DateTime<'D, d M Y H:i:s O'>")
     */
    private $createdAt;

    /**
     * @var \DateTime $updatedAt
     *
     * @ORM\Column(name="updated_at", type="datetime")
     */
    private $updatedAt;

    /**
     * @var \DateTime $expireAt
     *
     * @ORM\Column(name="expire_at", type="datetime", nullable=true)
     * @Serializer\Expose()
     * @Serializer\Groups({"api-poll", "api-poll-public", "api-leader-poll"})
     * @Serializer\Type("DateTime<'D, d M Y H:i:s O'>")
     */
    private $expireAt;

    /**
     * @var \DateTime $publishedAt
     *
     * @ORM\Column(name="published_at", type="datetime", nullable=true)
     * @Serializer\Expose()
     * @Serializer\Groups({"api-poll", "api-poll-public", "api-leader-poll"})
     * @Serializer\Type("DateTime<'D, d M Y H:i:s O'>")
     */
    private $publishedAt;

    /**
     * @Serializer\Expose()
     * @Serializer\Groups({"api-poll"})
     * @Serializer\Accessor(getter="isAnswered")
     * @Serializer\Type("boolean")
     * @Serializer\ReadOnly()
     */
    private $isAnswered;

    /**
     * @ORM\OneToMany(targetEntity="Comment", mappedBy="question", cascade={"remove","persist"})
     */
    private $comments;
    /**
     * @ORM\ManyToOne(targetEntity="Civix\CoreBundle\Entity\Representative")
     * @ORM\JoinColumn(name="report_recipient_id", referencedColumnName="id", onDelete="SET NULL")
     */
    private $reportRecipient;

    /**
     * @var String
     * @ORM\Column(name="report_recipient_group", type="string", nullable=true)
     *
     */
    private $reportRecipientGroup;

    /**
     * @ORM\Column(name="answers_count", type="integer", nullable=true)
     * @Serializer\Expose()
     * @Serializer\Groups({"api-activities", "api-poll"})
     *
     * @var integer
     */
    protected $answersCount;

    /**
     * @Serializer\Expose()
     * @Serializer\Groups({"api-poll"})
     * @Serializer\Accessor(getter="getRecipientQuestion")
     * @Serializer\Type("string")
     * @ORM\ManyToMany(targetEntity="Civix\CoreBundle\Entity\Representative", cascade={"remove"})
     * @ORM\JoinTable(name="questions_recipients",
     *      joinColumns={@ORM\JoinColumn(name="question_id", referencedColumnName="id", onDelete="CASCADE")},
     *      inverseJoinColumns={
     *          @ORM\JoinColumn(name="representative_id", referencedColumnName="id", onDelete="CASCADE")
     *      }
     * )
    */
    private $recipients;

    /**
     * @ORM\ManyToMany(targetEntity="Civix\CoreBundle\Entity\HashTag", mappedBy="questions")
     */
    protected $hashTags;

    /**
     * @var array
     *
     * @ORM\Column(name="cached_hash_tags", type="array", nullable=true)
     * @Serializer\Expose()
     * @Serializer\Groups({"api-poll", "api-poll-public"})
     */
    protected $cachedHashTags = array();

    /**
     * @ORM\ManyToMany(targetEntity="\Civix\CoreBundle\Entity\GroupSection")
     * @ORM\JoinTable(name="poll_sections",
     *      joinColumns={@ORM\JoinColumn(name="question_id", referencedColumnName="id", onDelete="CASCADE")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="group_section_id", referencedColumnName="id", onDelete="CASCADE")}
     * )
     */
    protected $groupSections;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->options = new \Doctrine\Common\Collections\ArrayCollection();
        $this->answers = new \Doctrine\Common\Collections\ArrayCollection();
        $this->recipients = new \Doctrine\Common\Collections\ArrayCollection();
        $this->educationalContext = new \Doctrine\Common\Collections\ArrayCollection();
        $this->comments = new \Doctrine\Common\Collections\ArrayCollection();
        $this->hashTags = new \Doctrine\Common\Collections\ArrayCollection();
        $this->groupSections = new \Doctrine\Common\Collections\ArrayCollection();
    }

    abstract public function getType();
    abstract public function getUser();

    /**
     * Return true if question answered
     * Can be used when question fetch by findAsUser() method
     *
     * @return bool
     */
    public function isAnswered()
    {
        return (bool) $this->getAnswers()->count();
    }

    /**
     * Can be used when question fetch by findAsUser() method
     *
     * @Serializer\Groups({"api-poll"})
     * @Serializer\VirtualProperty
     * @Serializer\SerializedName("answer_entity")
     */
    public function answerEntity()
    {
        return $this->isAnswered() ? $this->getAnswers()->first() : null;
    }

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
     * Set subject
     *
     * @param string $subject
     *
     * @return Question
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * Get subject
     *
     * @return string
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @ORM\PrePersist()
     */
    public function setCurrentTimeAsCreatedAt()
    {
        $this->setCreatedAt(new \DateTime('now'));
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Question
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function setCurrentTimeAsUpdatedAt()
    {
        $this->setUpdatedAt(new \DateTime('now'));
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return Question
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set publishedAt
     *
     * @param \DateTime $publishedAt
     *
     * @return Question
     */
    public function setPublishedAt($publishedAt)
    {
        $this->publishedAt = $publishedAt;

        return $this;
    }

    /**
     * Get publishedAt
     *
     * @return \DateTime
     */
    public function getPublishedAt()
    {
        return $this->publishedAt;
    }

    /**
     * @return \DateTime
     */
    public function getExpireAt()
    {
        return $this->expireAt;
    }

    /**
     * @param \DateTime $expireAt
     * @return $this
     */
    public function setExpireAt(\DateTime $expireAt)
    {
        $this->expireAt = $expireAt;

        return $this;
    }

    /**
     * Set answers_count
     *
     * @param integer $answersCount
     *
     * @return Question
     */
    public function setAnswersCount($answersCount)
    {
        $this->answersCount = $answersCount;

        return $this;
    }

    /**
     * Get answers_count
     *
     * @return integer
     */
    public function getAnswersCount()
    {
        return $this->answersCount;
    }

    /**
     * Add options
     *
     * @param Option $options
     *
     * @return Question
     */
    public function addOption(Option $options)
    {
        $options->setQuestion($this);

        $this->options[] = $options;

        return $this;
    }

    /**
     * Remove options
     *
     * @param Option $options
     */
    public function removeOption(Option $options)
    {
        $this->options->removeElement($options);
    }

    /**
     * Get options
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * Get educationalContext
     *
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getEducationalContext()
    {
        return $this->educationalContext;
    }

    /**
     * Add educationalText
     *
     * @return Question
     */
    public function addEducationalContext(\Civix\CoreBundle\Entity\Poll\EducationalContext $educationalContext)
    {
        $this->educationalContext[] = $educationalContext;

        return $this;
    }

    /**
     * Remove educationalText
     */
    public function removeEducationalText(\Civix\CoreBundle\Entity\Poll\EducationalContext $educationalContext)
    {
        $this->educationalContext->removeElement($educationalContext);
    }

    /**
     * hotfix: detach education context item for form update
     */
    public function clearEducationalContext()
    {
        foreach ($this->educationalContext as $context) {
            $context->setQuestion(null);
        }
        $this->educationalContext = [];
    }

    /**
     * Add answers
     *
     * @param  \Civix\CoreBundle\Entity\Poll\Answer $answers
     * @return Question
     */
    public function addAnswer(\Civix\CoreBundle\Entity\Poll\Answer $answers)
    {
        $this->answers[] = $answers;

        return $this;
    }

    /**
     * Remove answers
     *
     * @param \Civix\CoreBundle\Entity\Poll\Answer $answers
     */
    public function removeAnswer(\Civix\CoreBundle\Entity\Poll\Answer $answers)
    {
        $this->answers->removeElement($answers);
    }

    /**
     * Get answers
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAnswers()
    {
        return $this->answers;
    }

    /**
     * @return int
     */
    public function getMaxAnswers()
    {
        $max = 0;
        foreach ($this->getOptions() as $option) {
            if ($max < $option->getAnswers()->count()) {
                $max = $option->getAnswers()->count();
            }
        }

        return $max;
    }

    public function getStatistic($colors = array())
    {
        $sum = $this->getAnswers()->count();
        $max = $this->getMaxAnswers();

        $statistics = array();

        foreach ($this->getOptions() as $option) {
            if (!current($colors)) {
                reset($colors);
            }

            /* @var $option  \Civix\CoreBundle\Entity\Poll\Option */
            $stat = array(
                'option' => $option,
                'percent_answer'  => $sum > 0 ? round($option->getAnswers()->count() / $sum * 100) : 0,
                'percent_width' => $max > 0 ? round($option->getAnswers()->count() / $max * 100) : 0,
                'color' => current($colors)
            );

            if (1 > $stat['percent_width']) {
                $stat['percent_width'] = 1;
            }

            $statistics[] = $stat;

            next($colors);
        }

        return $statistics;
    }

    public function getRecipients()
    {
        return $this->recipients;
    }

    public function getComments()
    {
        return $this->comments;
    }

    public function addRecipient($recipient)
    {
        if (!$this->recipients->contains($recipient)) {
            $this->recipients->add($recipient);
        }

        return $this;
    }

    public function removeRecipient($recipient)
    {
        $this->recipients->removeElement($recipient);
    }

    public function getReportRecipientGroup()
    {
        return $this->reportRecipientGroup;
    }

    public function setReportRecipientGroup($recipient)
    {
        $this->reportRecipientGroup = $recipient;

        return $this;
    }

    public function getReportRecipient()
    {
        return $this->reportRecipient;
    }

    public function setReportRecipient($recipient)
    {
        $this->reportRecipient = $recipient;

        return $this;
    }

    public function getRecipientQuestion()
    {
        if ($this->reportRecipient) {
            return $this->reportRecipient;
        }

        if ($this->reportRecipientGroup) {
            return $this->reportRecipientGroup;
        }
    }

    /**
     * @Serializer\Groups({"api-poll"})
     * @Serializer\VirtualProperty
     * @Serializer\SerializedName("share_picture")
     * @Serializer\Type("Image")
     */
    public function getSharePicture()
    {
        $entity = $this->getUser();
        if ($entity instanceof Representative && !$entity->getAvatar()) {
            $entity = $entity->getRepresentativeStorage();
        }

        return new Image($entity, 'avatar');
    }

    /**
     * Add hashTags
     *
     * @param \Civix\CoreBundle\Entity\HashTag $hashTags
     * @return Question
     */
    public function addHashTag(\Civix\CoreBundle\Entity\HashTag $hashTags)
    {
        $this->hashTags[] = $hashTags;
    
        return $this;
    }

    /**
     * Remove hashTags
     *
     * @param \Civix\CoreBundle\Entity\HashTag $hashTags
     */
    public function removeHashTag(\Civix\CoreBundle\Entity\HashTag $hashTags)
    {
        $this->hashTags->removeElement($hashTags);
    }

    /**
     * Get hashTags
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getHashTags()
    {
        return $this->hashTags;
    }

    /**
     * Set cachedHashTags
     *
     * @param array $cachedHashTags
     * @return Question
     */
    public function setCachedHashTags($cachedHashTags)
    {
        $this->cachedHashTags = $cachedHashTags;
    
        return $this;
    }

    /**
     * Get cachedHashTags
     *
     * @return array 
     */
    public function getCachedHashTags()
    {
        return $this->cachedHashTags;
    }

    public function getGroupSectionIds()
    {
        $sectionsIds = $this->groupSections->map(function ($section) {
                return $section->getId();
        })->toArray();

        return empty($sectionsIds)?false:$sectionsIds;
    }
}
