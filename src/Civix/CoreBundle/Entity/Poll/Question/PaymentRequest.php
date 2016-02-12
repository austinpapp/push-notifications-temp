<?php

namespace Civix\CoreBundle\Entity\Poll\Question;

use Civix\CoreBundle\Entity\Poll\Question;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\ExecutionContextInterface;
use JMS\Serializer\Annotation as Serializer;

/**
 * @Assert\Callback(methods={"isCrowdfundingValid"}, groups={"payment-manage"})
 * @ORM\Entity(repositoryClass="Civix\CoreBundle\Repository\Poll\PaymentRequestRepository")
 */
abstract class PaymentRequest extends Question
{
    /**
     *
     * @ORM\Column(name="title", type="string")
     * @Assert\NotBlank(groups={"payment-manage"})
     * @Serializer\Expose()
     * @Serializer\Groups({"api-poll", "api-poll-public", "api-leader-poll"})
     */
    protected $title;

    /**
     *
     * @ORM\Column(name="is_crowdfunding", type="boolean", nullable=true)
     * @Serializer\Expose()
     * @Serializer\Groups({"api-poll", "api-poll-public", "api-leader-poll"})
     */
    protected $isCrowdfunding;

    /**
     * @var integer
     *
     * @ORM\Column(name="crowdfunding_goal_amount", type="integer", nullable=true)
     * @Serializer\Expose()
     * @Serializer\Groups({"api-poll", "api-poll-public", "api-leader-poll"})
     */
    protected $crowdfundingGoalAmount;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="crowdfunding_deadline", type="datetime", nullable=true)
     * @Serializer\Expose()
     * @Serializer\Groups({"api-poll", "api-poll-public", "api-leader-poll"})
     */
    protected $crowdfundingDeadline;

    /**
     *
     * @ORM\Column(name="is_crowdfunding_completed", type="boolean", nullable=true)
     * @Serializer\Expose()
     * @Serializer\Groups({"api-poll", "api-poll-public", "api-leader-poll"})
     */
    protected $isCrowdfundingCompleted;

    /**
     * @var integer
     *
     * @ORM\Column(name="crowdfunding_pledged_amount", type="integer", nullable=true)
     * @Serializer\Expose()
     * @Serializer\Groups({"api-poll", "api-poll-public", "api-leader-poll"})
     */
    protected $crowdfundingPledgedAmount;

    /**
     * @ORM\Column(name="is_allow_outsiders", type="boolean", options={"default" = false})
     * @Serializer\Expose()
     * @Serializer\Groups({"api-poll", "api-poll-public", "api-leader-poll"})
     */
    protected $isAllowOutsiders = false;

    /**
     * @Serializer\Groups({"api-poll", "api-poll-public"})
     * @Serializer\VirtualProperty
     * @Serializer\SerializedName("is_crowdfunding_deadline")
     */
    public function isCrowdfundingDeadline()
    {
        return $this->isCrowdfunding ? new \DateTime() > $this->getCrowdfundingDeadline() : null;
    }

    /**
     * @param mixed $title
     * @return $this
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param \DateTime $crowdfundingDeadline
     * @return $this
     */
    public function setCrowdfundingDeadline($crowdfundingDeadline)
    {
        $this->crowdfundingDeadline = $crowdfundingDeadline;
    }

    public function setIsAllowOutsiders($isAllowOutsiders)
    {
        $this->isAllowOutsiders = $isAllowOutsiders;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCrowdfundingDeadline()
    {
        return $this->crowdfundingDeadline;
    }

    /**
     * @param mixed $isCrowdfunding
     * @return $this
     */
    public function setIsCrowdfunding($isCrowdfunding)
    {
        $this->isCrowdfunding = $isCrowdfunding;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIsCrowdfunding()
    {
        return $this->isCrowdfunding;
    }

    /**
     * @param int $crowdfundingGoalAmount
     * @return $this
     */
    public function setCrowdfundingGoalAmount($crowdfundingGoalAmount)
    {
        $this->crowdfundingGoalAmount = $crowdfundingGoalAmount;

        return $this;
    }

    /**
     * @return int
     */
    public function getCrowdfundingGoalAmount()
    {
        return $this->crowdfundingGoalAmount;
    }

    public function isCrowdfundingValid(ExecutionContextInterface $context)
    {
        if ($this->getIsCrowdfunding()) {
            $minDeadline = new \DateTime();
            $minDeadline->add(new \DateInterval('P1D'));
            if ($this->getCrowdfundingDeadline() < $minDeadline) {
                $context->addViolationAt('crowdfundingDeadline',
                    'The deadline must be at least 24 hours from the current date.');
            }
        }
    }

    public function getType()
    {
        return 'payment_request' . ($this->getIsCrowdfunding() ? '_crowdfunding' : '');
    }

    public function getIsAllowOutsiders()
    {
        return $this->isAllowOutsiders;
    }

    /**
     * @param int $crowdfundingPledgedAmount
     * @return $this
     */
    public function setCrowdfundingPledgedAmount($crowdfundingPledgedAmount)
    {
        $this->crowdfundingPledgedAmount = $crowdfundingPledgedAmount;

        return $this;
    }

    /**
     * @return int
     */
    public function getCrowdfundingPledgedAmount()
    {
        return $this->crowdfundingPledgedAmount;
    }

    /**
     * @param mixed $isCrowdfundingCompleted
     * @return $this
     */
    public function setIsCrowdfundingCompleted($isCrowdfundingCompleted)
    {
        $this->isCrowdfundingCompleted = $isCrowdfundingCompleted;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIsCrowdfundingCompleted()
    {
        return $this->isCrowdfundingCompleted;
    }
}
