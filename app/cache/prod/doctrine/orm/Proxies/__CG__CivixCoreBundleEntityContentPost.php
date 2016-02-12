<?php

namespace Proxies\__CG__\Civix\CoreBundle\Entity\Content;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ORM. DO NOT EDIT THIS FILE.
 */
class Post extends \Civix\CoreBundle\Entity\Content\Post implements \Doctrine\ORM\Proxy\Proxy
{
    private $_entityPersister;
    private $_identifier;
    public $__isInitialized__ = false;
    public function __construct($entityPersister, $identifier)
    {
        $this->_entityPersister = $entityPersister;
        $this->_identifier = $identifier;
    }
    /** @private */
    public function __load()
    {
        if (!$this->__isInitialized__ && $this->_entityPersister) {
            $this->__isInitialized__ = true;

            if (method_exists($this, "__wakeup")) {
                // call this after __isInitialized__to avoid infinite recursion
                // but before loading to emulate what ClassMetadata::newInstance()
                // provides.
                $this->__wakeup();
            }

            if ($this->_entityPersister->load($this->_identifier, $this) === null) {
                throw new \Doctrine\ORM\EntityNotFoundException();
            }
            unset($this->_entityPersister, $this->_identifier);
        }
    }

    /** @private */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    
    public function getId()
    {
        if ($this->__isInitialized__ === false) {
            return (int) $this->_identifier["id"];
        }
        $this->__load();
        return parent::getId();
    }

    public function setShortDescription($shortDescription)
    {
        $this->__load();
        return parent::setShortDescription($shortDescription);
    }

    public function getShortDescription()
    {
        $this->__load();
        return parent::getShortDescription();
    }

    public function setTitle($title)
    {
        $this->__load();
        return parent::setTitle($title);
    }

    public function getTitle()
    {
        $this->__load();
        return parent::getTitle();
    }

    public function setContent($content)
    {
        $this->__load();
        return parent::setContent($content);
    }

    public function getContent()
    {
        $this->__load();
        return parent::getContent();
    }

    public function setPostImage($postImage)
    {
        $this->__load();
        return parent::setPostImage($postImage);
    }

    public function getPostImage()
    {
        $this->__load();
        return parent::getPostImage();
    }

    public function setImage($image)
    {
        $this->__load();
        return parent::setImage($image);
    }

    public function getImage()
    {
        $this->__load();
        return parent::getImage();
    }

    public function setIsPublished($isPublished)
    {
        $this->__load();
        return parent::setIsPublished($isPublished);
    }

    public function getIsPublished()
    {
        $this->__load();
        return parent::getIsPublished();
    }

    public function setCreatedAt($createdAt)
    {
        $this->__load();
        return parent::setCreatedAt($createdAt);
    }

    public function getCreatedAt()
    {
        $this->__load();
        return parent::getCreatedAt();
    }

    public function setUpdatedAt($updatedAt)
    {
        $this->__load();
        return parent::setUpdatedAt($updatedAt);
    }

    public function getUpdatedAt()
    {
        $this->__load();
        return parent::getUpdatedAt();
    }

    public function setPublishedAt($publishedAt)
    {
        $this->__load();
        return parent::setPublishedAt($publishedAt);
    }

    public function getPublishedAt()
    {
        $this->__load();
        return parent::getPublishedAt();
    }

    public function getImageSrc()
    {
        $this->__load();
        return parent::getImageSrc();
    }


    public function __sleep()
    {
        return array('__isInitialized__', 'id', 'shortDescription', 'title', 'content', 'postImage', 'isPublished', 'createdAt', 'updatedAt', 'publishedAt');
    }

    public function __clone()
    {
        if (!$this->__isInitialized__ && $this->_entityPersister) {
            $this->__isInitialized__ = true;
            $class = $this->_entityPersister->getClassMetadata();
            $original = $this->_entityPersister->load($this->_identifier);
            if ($original === null) {
                throw new \Doctrine\ORM\EntityNotFoundException();
            }
            foreach ($class->reflFields as $field => $reflProperty) {
                $reflProperty->setValue($this, $reflProperty->getValue($original));
            }
            unset($this->_entityPersister, $this->_identifier);
        }
        
    }
}