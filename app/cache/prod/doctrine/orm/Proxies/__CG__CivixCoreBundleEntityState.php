<?php

namespace Proxies\__CG__\Civix\CoreBundle\Entity;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ORM. DO NOT EDIT THIS FILE.
 */
class State extends \Civix\CoreBundle\Entity\State implements \Doctrine\ORM\Proxy\Proxy
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
        $this->__load();
        return parent::getId();
    }

    public function setCode($code)
    {
        $this->__load();
        return parent::setCode($code);
    }

    public function getCode()
    {
        if ($this->__isInitialized__ === false) {
            return $this->_identifier["code"];
        }
        $this->__load();
        return parent::getCode();
    }

    public function setName($name)
    {
        $this->__load();
        return parent::setName($name);
    }

    public function getName()
    {
        $this->__load();
        return parent::getName();
    }

    public function __toString()
    {
        $this->__load();
        return parent::__toString();
    }

    public function addLocalGroup(\Civix\CoreBundle\Entity\Group $localGroups)
    {
        $this->__load();
        return parent::addLocalGroup($localGroups);
    }

    public function removeLocalGroup(\Civix\CoreBundle\Entity\Group $localGroups)
    {
        $this->__load();
        return parent::removeLocalGroup($localGroups);
    }

    public function getLocalGroups()
    {
        $this->__load();
        return parent::getLocalGroups();
    }

    public function addStRepresentative(\Civix\CoreBundle\Entity\RepresentativeStorage $stRepresentatives)
    {
        $this->__load();
        return parent::addStRepresentative($stRepresentatives);
    }

    public function removeStRepresentative(\Civix\CoreBundle\Entity\RepresentativeStorage $stRepresentatives)
    {
        $this->__load();
        return parent::removeStRepresentative($stRepresentatives);
    }

    public function getStRepresentatives()
    {
        $this->__load();
        return parent::getStRepresentatives();
    }


    public function __sleep()
    {
        return array('__isInitialized__', 'code', 'name', 'localGroups', 'stRepresentatives');
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