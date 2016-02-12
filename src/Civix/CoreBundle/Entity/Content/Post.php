<?php

namespace Civix\CoreBundle\Entity\Content;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use JMS\Serializer\Annotation as Serializer;
use Civix\CoreBundle\Serializer\Type\Image;

/**
 * @ORM\Entity(repositoryClass="Civix\CoreBundle\Repository\Content\PostRepository")
 * @ORM\Table(name="posts")
 * @ORM\HasLifecycleCallbacks
 * @Vich\Uploadable
 * @Serializer\ExclusionPolicy("all")
 */
class Post
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Serializer\Expose()
     * @Serializer\Groups({"api-post"})
     */
    private $id;

    /**
     * @ORM\Column(name="short_description", type="text", length=200)
     * @Serializer\Expose()
     * @Serializer\Groups({"api-post"})
     */
    private $shortDescription;

    /**
     *
     * @ORM\Column(name="title", type="string")
     * @Serializer\Expose()
     * @Serializer\Groups({"api-post"})
     */
    private $title;

    /**
     * @ORM\Column(type="text")
     * @Serializer\Expose()
     * @Serializer\Groups({"api-post"})
     */
    private $content;

    /**
     * @Assert\File(
     *     maxSize="1M",
     *     mimeTypes={"image/png", "image/jpeg", "image/pjpeg"}
     * )
     * @Assert\NotBlank
     * @Vich\UploadableField(mapping="post_image", fileNameProperty="postImage")
     * @Serializer\Expose()
     * @Serializer\Groups({"api-post"})
     * @Serializer\Type("Image")
     * @Serializer\SerializedName("image")
     * @Serializer\Accessor(getter="getImageSrc")
     */
    private $image;

    /**
     * @ORM\Column(type="string", length=255, name="post_image", nullable=true)
     */
    private $postImage;

    /**
     * @ORM\Column(type="boolean", name="is_published")
     * @var Bool
     */
    private $isPublished;
    
    /**
     * @var \DateTime $createdAt
     *
     * @ORM\Column(name="created_at", type="datetime")
     * @Serializer\Expose()
     * @Serializer\Groups({"api-post"})
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
     * @var \DateTime $publishAt
     *
     * @ORM\Column(name="published_at", type="datetime", nullable=true)
     */

    private $publishedAt;

    public function __construct()
    {
        $this->isPublished = false;
        $this->createdAt = new \DateTime();
        $this->updatedAt = new \DateTime();
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
     * Set short description
     *
     * @param string $shortDescription
     * @return Post
     */
    public function setShortDescription($shortDescription)
    {
        $this->shortDescription = $shortDescription;
    
        return $this;
    }

    /**
     * Get short description
     *
     * @return string 
     */
    public function getShortDescription()
    {
        return $this->shortDescription;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Post
     */
    public function setTitle($title)
    {
        $this->title = $title;
    
        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set content
     *
     * @param string $content
     * @return Post
     */
    public function setContent($content)
    {
        $this->content = $content;
    
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
     * Set postImage
     *
     * @param string $postImage
     * @return Post
     */
    public function setPostImage($postImage)
    {
        $this->postImage = $postImage;
    
        return $this;
    }

    /**
     * Get postImage
     *
     * @return string 
     */
    public function getPostImage()
    {
        return $this->postImage;
    }

    public function setImage($image)
    {
        $this->image = $image;
        if ($image) {
            $this->updatedAt = new \DateTime();
        }

        return $this;
    }

    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set isPublished
     *
     * @param boolean $isPublished
     * @return Post
     */
    public function setIsPublished($isPublished)
    {
        $this->isPublished = $isPublished;

        return $this;
    }

    /**
     * Get isPublished
     *
     * @return boolean
     */
    public function getIsPublished()
    {
        return $this->isPublished;
    }
    
    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Post
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
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return Post
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
     * @return Post
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

    public function getImageSrc()
    {
        return new Image($this, 'image');
    }
}
