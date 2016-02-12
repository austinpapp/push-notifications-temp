<?php

namespace Civix\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Civix\CoreBundle\Controller\SerializerTrait;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Civix\CoreBundle\Entity\Customer\BankAccount;
use Civix\CoreBundle\Entity\Customer\Card;
use Civix\CoreBundle\Entity\Stripe\Customer;
use Civix\CoreBundle\Entity\Stripe\Account;

abstract class PaymentSettingsController extends Controller
{
    use SerializerTrait;

    /**
     * @Route("/")
     * @Template("CivixFrontBundle:PaymentSettings:index.html.twig")
     * @Method("GET")
     */
    public function indexAction()
    {
        $cards = null;
        $bankAccounts = null;

        /* @var Customer $customer */
        $customer = $this->getDoctrine()
            ->getRepository(Customer::getEntityClassByUser($this->getUser()))
            ->findOneBy(['user' => $this->getUser()]);
        if ($customer) {
            $cards = $customer->getCards();
        }

        /* @var Account $account */
        $account = $this->getDoctrine()
            ->getRepository(Account::getEntityClassByUser($this->getUser()))
            ->findOneBy(['user' => $this->getUser()]);
        if ($account) {
            $bankAccounts = $account->getBankAccounts();
        }

        return [
            'bankAccounts' => $bankAccounts,
            'cards' => $cards,
            'customer' => $customer,
            'return_path' => $this->generateUrl('civix_front_' . $this->getUser()->getType() . '_paymentsettings_index')
        ];
    }

    /**
     * @Route("/account/{type}", requirements={"type" = "personal|business"})
     * @Template("CivixFrontBundle:PaymentSettings:account-type.html.twig")
     */
    public function accountTypeAction($type, Request $request)
    {
        /* @var Customer $customer */
        $customer = $this->get('civix_core.customer_manager')
            ->getCustomerByUser($this->getUser());
        $formClass = '\\Civix\\FrontBundle\\Form\\Type\\Settings\\' . ucfirst($type) . 'PaymentAccount';
        $form = $this->createForm(new $formClass);

        if ('POST' === $request->getMethod() && $form->submit($request)->isValid()) {
            $this->get('civix_balanced.payment_manager')->updateCustomer($customer, $form->getData());
            $customer->setAccountType($type);
            $this->getDoctrine()->getManager()->flush($customer);

            return $this->redirect(
                $this->generateUrl('civix_front_' . $this->getUser()->getType() . '_paymentsettings_index')
            );
        }

        return [
            'form' => $form->createView(),
        ];
    }
}
