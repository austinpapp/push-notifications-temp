<?php

namespace Civix\ApiBundle\Controller\Leader;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Civix\ApiBundle\Controller\BaseController;
use Civix\CoreBundle\Entity\Stripe\Account;

/**
 * @Route("/bank-accounts")
 */
class BankAccountsController extends BaseController
{
    /**
     * @Route("/")
     * @Method("POST")
     */
    public function add()
    {
        $this->get('civix_core.stripe')
            ->addBankAccount($this->getUser(), $this->getJson());

        return $this->createJSONResponse($this->jmsSerialization([], ['api']));
    }

    /**
     * @Route("/")
     * @Method("GET")
     */
    public function listBankAccounts()
    {
        $bankAccounts = [];
        /* @var Account $account */
        $account = $this->getDoctrine()
            ->getRepository(Account::getEntityClassByUser($this->getUser()))
            ->findOneBy(['user' => $this->getUser()]);
        if ($account) {
            $bankAccounts = $account->getBankAccounts();
        }

        return $this->createJSONResponse($this->jmsSerialization($bankAccounts, ['api']));
    }
}