<?php

namespace Proxies\__CG__\Civix\CoreBundle\Entity\Poll;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ORM. DO NOT EDIT THIS FILE.
 */
class Option extends \Civix\CoreBundle\Entity\Poll\Option implements \Doctrine\ORM\Proxy\Proxy
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

    
    public function getVotesCount()
    {
        $this->__load();
        return parent::getVotesCount();
    }

    public function getId()
    {
        if ($this->__isInitialized__ === false) {
            return (int) $this->_identifier["id"];
        }
        $this->__load();
        return parent::getId();
    }

    public function setValue($value)
    {
        $this->__load();
        return parent::setValue($value);
    }

    public function getValue()
    {
        $this->__load();
        return parent::getValue();
    }

    public function setQuestion(\Civix\CoreBundle\Entity\Poll\Question $question = NULL)
    {
        $this->__load();
        return parent::setQuestion($question);
    }

    public function getQuestion()
    {
        $this->__load();
        return parent::getQuestion();
    }

    public function addAnswer(\Civix\CoreBundle\Entity\Poll\Answer $answers)
    {
        $this->__load();
        return parent::addAnswer($answers);
    }

    public function removeAnswer(\Civix\CoreBundle\Entity\Poll\Answer $answers)
    {
        $this->__load();
        return parent::removeAnswer($answers);
    }

    public function getAnswers()
    {
        $this->__load();
        return parent::getAnswers();
    }

    public function setPaymentAmount($payment_amount)
    {
        $this->__load();
        return parent::setPaymentAmount($payment_amount);
    }

    public function getPaymentAmount()
    {
        $this->__load();
        return parent::getPaymentAmount();
    }

    public function setIsUserAmount($isUserAmount)
    {
        $this->__load();
        return parent::setIsUserAmount($isUserAmount);
    }

    public function getIsUserAmount()
    {
        $this->__load();
        return parent::getIsUserAmount();
    }


    public function __sleep()
    {
        return array('__isInitialized__', 'id', 'value', 'payment_amount', 'isUserAmount', 'question', 'answers');
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