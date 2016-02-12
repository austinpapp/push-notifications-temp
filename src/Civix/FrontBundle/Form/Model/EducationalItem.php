<?php

namespace Civix\FrontBundle\Form\Model;

use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints as Assert;

/**
 *
 * @Vich\Uploadable
 */
class EducationalItem
{

    /**
     * @Assert\File(
     *     maxSize="10M",
     *     mimeTypes={"image/png", "image/jpeg", "image/pjpeg"}
     * )
     * @Vich\UploadableField(mapping="educational_image", fileNameProperty="image")
     */
    private $imageFile;

    private $image;

    private $video;

    private $text;

    private $ec;

    public function __construct(\Civix\CoreBundle\Entity\Poll\EducationalContext $context = null)
    {
        if ($context) {
            $this->ec = $context;
            $type = $context->getType();
            if ($type === $context::VIDEO_TYPE) {
                $this->setVideo($context->getText());
            } elseif ($type === $context::IMAGE_TYPE) {
                $this->setImage($context->getText());
            } else {
                $this->setText($context->getText());
            }
        }
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    public function getImageFile()
    {
        return $this->imageFile;
    }

    public function setImageFile($imageFile)
    {
        $this->imageFile = $imageFile;

        return $this;
    }

    public function getVideo()
    {
        return $this->video;
    }

    public function setVideo($video)
    {
        $this->video = $video;

        return $this;
    }

    public function getText()
    {
        return $this->text;
    }

    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * @return \Civix\CoreBundle\Entity\Poll\EducationalContext
     */
    public function createEntity()
    {
        $entity = $this->ec ? $this->ec : new \Civix\CoreBundle\Entity\Poll\EducationalContext();
        if ($this->image) {
            $entity->setText($this->image)->setType($entity::IMAGE_TYPE);
        } elseif ($this->video) {
            $entity->setText($this->video)->setType($entity::VIDEO_TYPE);
        } else {
            $entity->setText($this->text)->setType($entity::TEXT_TYPE);
        }

        if ($entity->getText()) {
            return $entity;
        }
    }

    public function isEmpty()
    {
        return $this->imageFile === null && !$this->image && !$this->text && !$this->video;
    }
}
