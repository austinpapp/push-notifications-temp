<?php

namespace Civix\CoreBundle\Repository\Customer;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\Security\Core\User\UserInterface;

class CustomerRepository extends EntityRepository
{
    public function findCustomerByUser(UserInterface $user)
    {
        return $this->createQueryBuilder('cust')
            ->where('cust.user = :user')
            ->setParameter('user', $user)
            ->getQuery()
            ->getOneOrNullResult();
    }
}
