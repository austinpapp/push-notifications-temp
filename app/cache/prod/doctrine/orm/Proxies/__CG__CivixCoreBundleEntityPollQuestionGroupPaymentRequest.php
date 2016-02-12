<?php

namespace Proxies\__CG__\Civix\CoreBundle\Entity\Poll\Question;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ORM. DO NOT EDIT THIS FILE.
 */
class GroupPaymentRequest extends \Civix\CoreBundle\Entity\Poll\Question\GroupPaymentRequest implements \Doctrine\ORM\Proxy\Proxy
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

    
    public function getType()
    {
        $this->__load();
        return parent::getType();
    }

    public function setUser(\Civix\CoreBundle\Entity\Group $user = NULL)
    {
        $this->__load();
        return parent::setUser($user);
    }

    public function getUser()
    {
        $this->__load();
        return parent::getUser();
    }

    public function isCrowdfundingDeadline()
    {
        $this->__load();
        return parent::isCrowdfundingDeadline();
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

    public function setCrowdfundingDeadline($crowdfundingDeadline)
    {
        $this->__load();
        return parent::setCrowdfundingDeadline($crowdfundingDeadline);
    }

    public function setIsAllowOutsiders($isAllowOutsiders)
    {
        $this->__load();
        return parent::setIsAllowOutsiders($isAllowOutsiders);
    }

    public function getCrowdfundingDeadline()
    {
        $this->__load();
        return parent::getCrowdfundingDeadline();
    }

    public function setIsCrowdfunding($isCrowdfunding)
    {
        $this->__load();
        return parent::setIsCrowdfunding($isCrowdfunding);
    }

    public function getIsCrowdfunding()
    {
        $this->__load();
        return parent::getIsCrowdfunding();
    }

    public function setCrowdfundingGoalAmount($crowdfundingGoalAmount)
    {
        $this->__load();
        return parent::setCrowdfundingGoalAmount($crowdfundingGoalAmount);
    }

    public function getCrowdfundingGoalAmount()
    {
        $this->__load();
        return parent::getCrowdfundingGoalAmount();
    }

    public function isCrowdfundingValid(\Symfony\Component\Validator\ExecutionContextInterface $context)
    {
        $this->__load();
        return parent::isCrowdfundingValid($context);
    }

    public function getIsAllowOutsiders()
    {
        $this->__load();
        return parent::getIsAllowOutsiders();
    }

    public function setCrowdfundingPledgedAmount($crowdfundingPledgedAmount)
    {
        $this->__load();
        return parent::setCrowdfundingPledgedAmount($crowdfundingPledgedAmount);
    }

    public function getCrowdfundingPledgedAmount()
    {
        $this->__load();
        return parent::getCrowdfundingPledgedAmount();
    }

    public function setIsCrowdfundingCompleted($isCrowdfundingCompleted)
    {
        $this->__load();
        return parent::setIsCrowdfundingCompleted($isCrowdfundingCompleted);
    }

    public function getIsCrowdfundingCompleted()
    {
        $this->__load();
        return parent::getIsCrowdfundingCompleted();
    }

    public function isAnswered()
    {
        $this->__load();
        return parent::isAnswered();
    }

    public function answerEntity()
    {
        $this->__load();
        return parent::answerEntity();
    }

    public function getId()
    {
        if ($this->__isInitialized__ === false) {
            return (int) $this->_identifier["id"];
        }
        $this->__load();
        return parent::getId();
    }

    public function setSubject($subject)
    {
        $this->__load();
        return parent::setSubject($subject);
    }

    public function getSubject()
    {
        $this->__load();
        return parent::getSubject();
    }

    public function setCurrentTimeAsCreatedAt()
    {
        $this->__load();
        return parent::setCurrentTimeAsCreatedAt();
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

    public function setCurrentTimeAsUpdatedAt()
    {
        $this->__load();
        return parent::setCurrentTimeAsUpdatedAt();
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

    public function getExpireAt()
    {
        $this->__load();
        return parent::getExpireAt();
    }

    public function setExpireAt(\DateTime $expireAt)
    {
        $this->__load();
        return parent::setExpireAt($expireAt);
    }

    public function setAnswersCount($answersCount)
    {
        $this->__load();
        return parent::setAnswersCount($answersCount);
    }

    public function getAnswersCount()
    {
        $this->__load();
        return parent::getAnswersCount();
    }

    public function addOption(\Civix\CoreBundle\Entity\Poll\Option $options)
    {
        $this->__load();
        return parent::addOption($options);
    }

    public function removeOption(\Civix\CoreBundle\Entity\Poll\Option $options)
    {
        $this->__load();
        return parent::removeOption($options);
    }

    public function getOptions()
    {
        $this->__load();
        return parent::getOptions();
    }

    public function getEducationalContext()
    {
        $this->__load();
        return parent::getEducationalContext();
    }

    public function addEducationalContext(\Civix\CoreBundle\Entity\Poll\EducationalContext $educationalContext)
    {
        $this->__load();
        return parent::addEducationalContext($educationalContext);
    }

    public function removeEducationalText(\Civix\CoreBundle\Entity\Poll\EducationalContext $educationalContext)
    {
        $this->__load();
        return parent::removeEducationalText($educationalContext);
    }

    public function clearEducationalContext()
    {
        $this->__load();
        return parent::clearEducationalContext();
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

    public function getMaxAnswers()
    {
        $this->__load();
        return parent::getMaxAnswers();
    }

    public function getStatistic($colors = array (
))
    {
        $this->__load();
        return parent::getStatistic($colors);
    }

    public function getRecipients()
    {
        $this->__load();
        return parent::getRecipients();
    }

    public function getComments()
    {
        $this->__load();
        return parent::getComments();
    }

    public function addRecipient($recipient)
    {
        $this->__load();
        return parent::addRecipient($recipient);
    }

    public function removeRecipient($recipient)
    {
        $this->__load();
        return parent::removeRecipient($recipient);
    }

    public function getReportRecipientGroup()
    {
        $this->__load();
        return parent::getReportRecipientGroup();
    }

    public function setReportRecipientGroup($recipient)
    {
        $this->__load();
        return parent::setReportRecipientGroup($recipient);
    }

    public function getReportRecipient()
    {
        $this->__load();
        return parent::getReportRecipient();
    }

    public function setReportRecipient($recipient)
    {
        $this->__load();
        return parent::setReportRecipient($recipient);
    }

    public function getRecipientQuestion()
    {
        $this->__load();
        return parent::getRecipientQuestion();
    }

    public function getSharePicture()
    {
        $this->__load();
        return parent::getSharePicture();
    }

    public function addHashTag(\Civix\CoreBundle\Entity\HashTag $hashTags)
    {
        $this->__load();
        return parent::addHashTag($hashTags);
    }

    public function removeHashTag(\Civix\CoreBundle\Entity\HashTag $hashTags)
    {
        $this->__load();
        return parent::removeHashTag($hashTags);
    }

    public function getHashTags()
    {
        $this->__load();
        return parent::getHashTags();
    }

    public function setCachedHashTags($cachedHashTags)
    {
        $this->__load();
        return parent::setCachedHashTags($cachedHashTags);
    }

    public function getCachedHashTags()
    {
        $this->__load();
        return parent::getCachedHashTags();
    }

    public function getGroupSectionIds()
    {
        $this->__load();
        return parent::getGroupSectionIds();
    }

    public function addGroupSection(\Civix\CoreBundle\Entity\GroupSection $section)
    {
        $this->__load();
        return parent::addGroupSection($section);
    }

    public function removeGroupSection(\Civix\CoreBundle\Entity\GroupSection $section)
    {
        $this->__load();
        return parent::removeGroupSection($section);
    }

    public function getGroupSections()
    {
        $this->__load();
        return parent::getGroupSections();
    }


    public function __sleep()
    {
        return array('__isInitialized__', 'id', 'subject', 'createdAt', 'updatedAt', 'expireAt', 'publishedAt', 'reportRecipientGroup', 'answersCount', 'cachedHashTags', 'options', 'answers', 'educationalContext', 'comments', 'reportRecipient', 'recipients', 'hashTags', 'groupSections', 'title', 'isCrowdfunding', 'crowdfundingGoalAmount', 'crowdfundingDeadline', 'isCrowdfundingCompleted', 'crowdfundingPledgedAmount', 'isAllowOutsiders', 'user');
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