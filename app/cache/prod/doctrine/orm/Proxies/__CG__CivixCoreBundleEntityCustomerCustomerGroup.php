<?php

namespace Proxies\__CG__\Civix\CoreBundle\Entity\Customer;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ORM. DO NOT EDIT THIS FILE.
 */
class CustomerGroup extends \Civix\CoreBundle\Entity\Customer\CustomerGroup implements \Doctrine\ORM\Proxy\Proxy
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

    
    public function getUser()
    {
        $this->__load();
        return parent::getUser();
    }

    public function setUser(\Civix\CoreBundle\Entity\Group $user = NULL)
    {
        $this->__load();
        return parent::setUser($user);
    }

    public function getEmail()
    {
        $this->__load();
        return parent::getEmail();
    }

    public function getId()
    {
        if ($this->__isInitialized__ === false) {
            return (int) $this->_identifier["id"];
        }
        $this->__load();
        return parent::getId();
    }

    public function getBalancedUri()
    {
        $this->__load();
        return parent::getBalancedUri();
    }

    public function setBalancedUri($uri)
    {
        $this->__load();
        return parent::setBalancedUri($uri);
    }

    public function getUsername()
    {
        $this->__load();
        return parent::getUsername();
    }

    public function setAccountType($accountType)
    {
        $this->__load();
        return parent::setAccountType($accountType);
    }

    public function getAccountType()
    {
        $this->__load();
        return parent::getAccountType();
    }


    public function __sleep()
    {
        return array('__isInitialized__', 'id', 'balancedUri', 'accountType', 'user');
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