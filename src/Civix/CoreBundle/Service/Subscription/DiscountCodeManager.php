<?php

namespace Civix\CoreBundle\Service\Subscription;

use Doctrine\ORM\EntityManager;
use Civix\CoreBundle\Entity\Subscription\DiscountCode;
use Civix\CoreBundle\Entity\Subscription\DiscountCodeHistory;
use Civix\CoreBundle\Entity\Subscription\Subscription;
use Civix\CoreBundle\Entity\Customer\Customer;
use Civix\CoreBundle\Exception\Discount\BadCodeException;

class DiscountCodeManager
{
    /**
     * @var EntityManager
     */
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }
    
    public function applyCode(Customer $customer, $package, $code)
    {
        $discountCode = $this->em->getRepository(DiscountCode::class)
            ->findAvailableCode($package, $code);
        if (!$discountCode) {
            throw new BadCodeException('Incorrect discount code');
        }
        
        //get used period
        if (!$this->isCodeHasAvailablePeriod($customer, $discountCode)) {
            throw new BadCodeException('This discount code has been expired');
        }
        
        //check how many customer code has been used
        if ($this->isCodeLimitUsed($discountCode)) {
            throw new BadCodeException('This discount code has been used');
        }

        //add code to history with apply only status
        $this->addToHistory($discountCode, $customer);

        return $discountCode;
    }

    public function useCode(Customer $customer, DiscountCode $code = null)
    {
        if (!$code) {
            return;
        }
        
        $historyRecord = $this->em->getRepository(DiscountCodeHistory::class)->findOneBy([
            'code' => $code,
            'customer' => $customer,
            'status' => DiscountCodeHistory::STATUS_APPLIED_ONLY
        ]);
        //set used status
        $historyRecord->setStatus(DiscountCodeHistory::STATUS_PAYED);
        $this->em->persist($historyRecord);
        $this->em->flush($historyRecord);
        
        $isAvailablePeriod = $this->isCodeHasAvailablePeriod($customer, $code);
        if ($isAvailablePeriod) {
            //apply code for next month
            $this->addToHistory($code, $customer);
        }
        
        if (!$isAvailablePeriod && $this->isCodeLimitUsed($code) && !$this->isCodeHaveApplyOnly($code)) {
            $code->setStatus(DiscountCode::STATUS_USED);
            $this->em->persist($code);
            $this->em->flush($code);
        }
    }
    
    public function addToHistory(DiscountCode $code, Customer $customer)
    {
        $history = new DiscountCodeHistory();
        $history->setCode($code);
        $history->setCustomer($customer);
        $history->setStatus(DiscountCodeHistory::STATUS_APPLIED_ONLY);
        $this->em->persist($history);
        $this->em->flush($history);
    }

    private function isCodeHasAvailablePeriod(Customer $customer, DiscountCode $discountCode)
    {
        $usedPeriods = $this->em->getRepository(DiscountCodeHistory::class)
            ->getCountUsedMonth($discountCode, $customer);
        
        return $usedPeriods < $discountCode->getMonth();
    }

    public function isCodeLimitUsed(DiscountCode $discountCode)
    {
        $usedTimes = $this->em->getRepository(DiscountCodeHistory::class)
            ->getCountNumberUsedCode($discountCode);
        
        return ($usedTimes >= $discountCode->getMaxUsers());
    }

    public function isCodeHaveApplyOnly(DiscountCode $discountCode)
    {
        $codeUsed = $this->em->getRepository(DiscountCodeHistory::class)
            ->getCountNumberUsedCodeWithStatus($discountCode);

        return (0 < $codeUsed);
    }
}
