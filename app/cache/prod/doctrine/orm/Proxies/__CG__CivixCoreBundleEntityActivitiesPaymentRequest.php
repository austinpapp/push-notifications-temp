<?php

namespace Proxies\__CG__\Civix\CoreBundle\Entity\Activities;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ORM. DO NOT EDIT THIS FILE.
 */
class PaymentRequest extends \Civix\CoreBundle\Entity\Activities\PaymentRequest implements \Doctrine\ORM\Proxy\Proxy
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

    
    public function getEntity()
    {
        $this->__load();
        return parent::getEntity();
    }

    public function setQuestionId($id)
    {
        $this->__load();
        return parent::setQuestionId($id);
    }

    public function getQuestionId()
    {
        $this->__load();
        return parent::getQuestionId();
    }

    public function getId()
    {
        if ($this->__isInitialized__ === false) {
            return (int) $this->_identifier["id"];
        }
        $this->__load();
        return parent::getId();
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

    public function setDescription($description)
    {
        $this->__load();
        return parent::setDescription($description);
    }

    public function getDescription()
    {
        $this->__load();
        return parent::getDescription();
    }

    public function setSentAt($sentAt)
    {
        $this->__load();
        return parent::setSentAt($sentAt);
    }

    public function getSentAt()
    {
        $this->__load();
        return parent::getSentAt();
    }

    public function setExpireAt($expireAt)
    {
        $this->__load();
        return parent::setExpireAt($expireAt);
    }

    public function getExpireAt()
    {
        $this->__load();
        return parent::getExpireAt();
    }

    public function setResponsesCount($responsesCount)
    {
        $this->__load();
        return parent::setResponsesCount($responsesCount);
    }

    public function getResponsesCount()
    {
        $this->__load();
        return parent::getResponsesCount();
    }

    public function setRepresentative(\Civix\CoreBundle\Entity\Representative $representative)
    {
        $this->__load();
        return parent::setRepresentative($representative);
    }

    public function setGroup(\Civix\CoreBundle\Entity\Group $group)
    {
        $this->__load();
        return parent::setGroup($group);
    }

    public function setSuperuser(\Civix\CoreBundle\Entity\Superuser $superuser)
    {
        $this->__load();
        return parent::setSuperuser($superuser);
    }

    public function setUser(\Civix\CoreBundle\Entity\User $user)
    {
        $this->__load();
        return parent::setUser($user);
    }

    public function getOwner()
    {
        $this->__load();
        return parent::getOwner();
    }

    public function setOwner($data)
    {
        $this->__load();
        return parent::setOwner($data);
    }

    public function getOwnerData()
    {
        $this->__load();
        return parent::getOwnerData();
    }

    public function getPicture()
    {
        $this->__load();
        return parent::getPicture();
    }

    public function setPicture($picture)
    {
        $this->__load();
        return parent::setPicture($picture);
    }

    public function setIsOutsiders($isOutsiders)
    {
        $this->__load();
        return parent::setIsOutsiders($isOutsiders);
    }

    public function getIsOutsiders()
    {
        $this->__load();
        return parent::getIsOutsiders();
    }

    public function getRepresentative()
    {
        $this->__load();
        return parent::getRepresentative();
    }

    public function getGroup()
    {
        $this->__load();
        return parent::getGroup();
    }

    public function getSuperuser()
    {
        $this->__load();
        return parent::getSuperuser();
    }

    public function getUser()
    {
        $this->__load();
        return parent::getUser();
    }

    public function addActivityCondition(\Civix\CoreBundle\Entity\ActivityCondition $activityConditions)
    {
        $this->__load();
        return parent::addActivityCondition($activityConditions);
    }

    public function removeActivityCondition(\Civix\CoreBundle\Entity\ActivityCondition $activityConditions)
    {
        $this->__load();
        return parent::removeActivityCondition($activityConditions);
    }

    public function getActivityConditions()
    {
        $this->__load();
        return parent::getActivityConditions();
    }

    public function isRead()
    {
        $this->__load();
        return parent::isRead();
    }

    public function setRead($read)
    {
        $this->__load();
        return parent::setRead($read);
    }

    public function getRateUp()
    {
        $this->__load();
        return parent::getRateUp();
    }

    public function setRateUp($rateUp)
    {
        $this->__load();
        return parent::setRateUp($rateUp);
    }

    public function getRateDown()
    {
        $this->__load();
        return parent::getRateDown();
    }

    public function setRateDown($rateDown)
    {
        $this->__load();
        return parent::setRateDown($rateDown);
    }

    public function getImageSrc()
    {
        $this->__load();
        return parent::getImageSrc();
    }

    public function setImageSrc($imageSrc)
    {
        $this->__load();
        return parent::setImageSrc($imageSrc);
    }

    public function getImage()
    {
        $this->__load();
        return parent::getImage();
    }

    public function setImage($image)
    {
        $this->__load();
        return parent::setImage($image);
    }

    public function getActivityImage()
    {
        $this->__load();
        return parent::getActivityImage();
    }


    public function __sleep()
    {
        return array('__isInitialized__', 'id', 'title', 'description', 'sentAt', 'expireAt', 'responsesCount', 'owner', 'isOutsiders', 'rateUp', 'rateDown', 'imageSrc', 'representative', 'group', 'superuser', 'user', 'activityConditions', 'questionId');
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