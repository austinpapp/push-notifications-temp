<?php

namespace Civix\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\InheritanceType;
use Doctrine\ORM\Mapping\DiscriminatorColumn;
use Doctrine\ORM\Mapping\DiscriminatorMap;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\ExecutionContextInterface;
use JMS\Serializer\Annotation as Serializer;
use Civix\CoreBundle\Serializer\Type\Image;
use Civix\CoreBundle\Entity\Representative;

/**
 * Announcement
 *
 * @ORM\Table(name="announcements")
 * @ORM\Entity(repositoryClass="Civix\CoreBundle\Repository\AnnouncementRepository")
 * @ORM\HasLifecycleCallbacks()
 * @InheritanceType("SINGLE_TABLE")
 * @DiscriminatorColumn(name="type", type="string")
 * @DiscriminatorMap({
 *      "group" = "Civix\CoreBundle\Entity\Announcement\GroupAnnouncement",
 *      "representative" = "Civix\CoreBundle\Entity\Announcement\RepresentativeAnnouncement",
 * })
 * @Assert\Callback(methods={"isContentValid"})
 * @Serializer\ExclusionPolicy("all")
 *
 */
abstract class Announcement
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     *
     * @Serializer\Expose()
     * @Serializer\Groups({"api"})
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text")
     * @Assert\NotBlank()
     */
    private $content;

    /**
     * @var string
     *
     * @ORM\Column(name="content_parsed", type="text")
     * @Assert\NotBlank(message="The announcement should not be blank")
     *
     * @Serializer\Expose()
     * @Serializer\Groups({"api"})
     */
    private $contentParsed;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="published_at", type="datetime", nullable=true)
     * @Serializer\Expose()
     * @Serializer\Groups({"api"})
     * @Serializer\Type("DateTime<'D, d M Y H:i:s O'>")
     */
    private $publishedAt;

    /**
     * @ORM\ManyToOne(targetEntity="Civix\CoreBundle\Entity\Representative")
     * @ORM\JoinColumn(name="representative_id", referencedColumnName="id", onDelete="CASCADE")
     */
    protected $representative;

    /**
     * @ORM\ManyToOne(targetEntity="Civix\CoreBundle\Entity\Group")
     * @ORM\JoinColumn(name="group_id", referencedColumnName="id", onDelete="CASCADE")
     */
    protected $group;

    /**
     * @Serializer\Expose()
     * @Serializer\Groups({"api"})
     * @Serializer\Accessor(getter="getUser")
     */
    private $user;
    
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
     * Set content
     *
     * @param string $content
     * @return Announcement
     */
    public function setContent($content)
    {
        $this->content = $content;
        $this->setContentParsed(\Civix\CoreBundle\Parser\UrlConverter::convert($content));
    
        return $this;
    }

    /**
     * Get content
     *
     * @return string 
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set contentParsed
     *
     * @param string $contentParsed
     * @return Announcement
     */
    public function setContentParsed($contentParsed)
    {
        $this->contentParsed = $contentParsed;
    
        return $this;
    }

    /**
     * Get contentParsed
     *
     * @return string 
     */
    public function getContentParsed()
    {
        return $this->contentParsed;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Announcement
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
     * Set publishedAt
     *
     * @param \DateTime $publishedAt
     * @return Announcement
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
     * @ORM\PrePersist()
     */
    public function setCreatedDate()
    {
        $this->setCreatedAt(new \DateTime());
    }

    public function isContentValid(ExecutionContextInterface $context)
    {
        $text = preg_replace(array('/<a[^>]+href[^>]+>/', '/<\/a>/'), '', $this->contentParsed);

        if (mb_strlen($text, 'utf-8') > 250) {
            $context->addViolationAt('content', 'The message too long');
        }

    }

    /**
     * @Serializer\Groups({"api"})
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

    abstract public function getUser();
    abstract public function setUser();
}
