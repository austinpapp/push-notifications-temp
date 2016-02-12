<?php

namespace Proxies\__CG__\Civix\CoreBundle\Entity\Subscription;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ORM. DO NOT EDIT THIS FILE.
 */
class Subscription extends \Civix\CoreBundle\Entity\Subscription\Subscription implements \Doctrine\ORM\Proxy\Proxy
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

    
    public function setEnabled($enabled)
    {
        $this->__load();
        return parent::setEnabled($enabled);
    }

    public function getEnabled()
    {
        $this->__load();
        return parent::getEnabled();
    }

    public function setExpiredAt($expiredAt)
    {
        $this->__load();
        return parent::setExpiredAt($expiredAt);
    }

    public function getExpiredAt()
    {
        $this->__load();
        return parent::getExpiredAt();
    }

    public function setGroup($group)
    {
        $this->__load();
        return parent::setGroup($group);
    }

    public function getGroup()
    {
        $this->__load();
        return parent::getGroup();
    }

    public function setId($id)
    {
        $this->__load();
        return parent::setId($id);
    }

    public function getId()
    {
        if ($this->__isInitialized__ === false) {
            return (int) $this->_identifier["id"];
        }
        $this->__load();
        return parent::getId();
    }

    public function setPackageType($packageType)
    {
        $this->__load();
        return parent::setPackageType($packageType);
    }

    public function getPackageType()
    {
        $this->__load();
        return parent::getPackageType();
    }

    public function setRepresentative($representative)
    {
        $this->__load();
        return parent::setRepresentative($representative);
    }

    public function getRepresentative()
    {
        $this->__load();
        return parent::getRepresentative();
    }

    public function setCard(\Civix\CoreBundle\Entity\Customer\Card $card = NULL)
    {
        $this->__load();
        return parent::setCard($card);
    }

    public function getCard()
    {
        $this->__load();
        return parent::getCard();
    }

    public function setNextPaymentAt($nextPaymentAt)
    {
        $this->__load();
        return parent::setNextPaymentAt($nextPaymentAt);
    }

    public function getNextPaymentAt()
    {
        $this->__load();
        return parent::getNextPaymentAt();
    }

    public function getStripeId()
    {
        $this->__load();
        return parent::getStripeId();
    }

    public function setStripeId($stripeId)
    {
        $this->__load();
        return parent::setStripeId($stripeId);
    }

    public function getStripeData()
    {
        $this->__load();
        return parent::getStripeData();
    }

    public function setStripeData($stripeData)
    {
        $this->__load();
        return parent::setStripeData($stripeData);
    }

    public function getStripeSyncAt()
    {
        $this->__load();
        return parent::getStripeSyncAt();
    }

    public function setStripeSyncAt($stripeSyncAt)
    {
        $this->__load();
        return parent::setStripeSyncAt($stripeSyncAt);
    }

    public function getUserEntity()
    {
        $this->__load();
        return parent::getUserEntity();
    }

    public function setUserEntity(\Civix\CoreBundle\Entity\UserInterface $entity)
    {
        $this->__load();
        return parent::setUserEntity($entity);
    }

    public function isActive()
    {
        $this->__load();
        return parent::isActive();
    }

    public function isSyncNeeded()
    {
        $this->__load();
        return parent::isSyncNeeded();
    }

    public function syncStripeData($so)
    {
        $this->__load();
        return parent::syncStripeData($so);
    }

    public function stripeReset()
    {
        $this->__load();
        return parent::stripeReset();
    }

    public function isNotFree()
    {
        $this->__load();
        return parent::isNotFree();
    }

    public function getLabel()
    {
        $this->__load();
        return parent::getLabel();
    }

    public function getPlanId()
    {
        $this->__load();
        return parent::getPlanId();
    }


    public function __sleep()
    {
        return array('__isInitialized__', 'id', 'packageType', 'expiredAt', 'nextPaymentAt', 'enabled', 'stripeId', 'stripeData', 'stripeSyncAt', 'representative', 'group', 'card');
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