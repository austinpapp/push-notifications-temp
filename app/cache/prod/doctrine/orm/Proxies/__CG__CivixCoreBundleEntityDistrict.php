<?php

namespace Proxies\__CG__\Civix\CoreBundle\Entity;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ORM. DO NOT EDIT THIS FILE.
 */
class District extends \Civix\CoreBundle\Entity\District implements \Doctrine\ORM\Proxy\Proxy
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

    public function setLabel($label)
    {
        $this->__load();
        return parent::setLabel($label);
    }

    public function getLabel()
    {
        $this->__load();
        return parent::getLabel();
    }

    public function setDistrictType($districtType)
    {
        $this->__load();
        return parent::setDistrictType($districtType);
    }

    public function getDistrictType()
    {
        $this->__load();
        return parent::getDistrictType();
    }

    public function getDistrictTypeName()
    {
        $this->__load();
        return parent::getDistrictTypeName();
    }

    public function __toString()
    {
        $this->__load();
        return parent::__toString();
    }

    public function addUser(\Civix\CoreBundle\Entity\User $users)
    {
        $this->__load();
        return parent::addUser($users);
    }

    public function removeUser(\Civix\CoreBundle\Entity\User $users)
    {
        $this->__load();
        return parent::removeUser($users);
    }

    public function getUsers()
    {
        $this->__load();
        return parent::getUsers();
    }


    public function __sleep()
    {
        return array('__isInitialized__', 'id', 'label', 'districtType', 'users');
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