<?php

namespace Civix\CoreBundle\Entity\Customer;


interface CustomerAccessorInterface
{
    /**
     * @return Customer
     */
    public function getCustomer();

    /**
     * @param Customer $customer
     * @return $this
     */
    public function setCustomer(Customer $customer);
} 