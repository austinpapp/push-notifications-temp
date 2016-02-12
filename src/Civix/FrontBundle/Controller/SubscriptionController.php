<?php

namespace Civix\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Civix\CoreBundle\Entity\Subscription\Subscription;
use Civix\CoreBundle\Entity\Customer\Card;
use Civix\CoreBundle\Entity\Customer\Customer;
use Civix\CoreBundle\Entity\Subscription\DiscountCodeHistory;
use Civix\CoreBundle\Exception\Discount\BadCodeException;
use Symfony\Component\Validator\Constraints\DateTime;

abstract class SubscriptionController extends Controller
{
    /**
     * @Route("")
     * @Method({"GET"})
     * @Template("CivixFrontBundle:Subscription:index.html.twig")
     */
    public function indexAction()
    {
        $subscription = $this->get('civix_core.subscription_manager')->getSubscription($this->getUser());

        return [
            'packages' => $this->get('civix_core.subscription_manager')->getPackagesInfo($subscription),
            'subscription' => $subscription,
            'token' => $this->getToken(),
        ];
    }

    /**
     * @Route("/{id}/subscribe", requirements={"id"="20|30|40"})
     * @Template("CivixFrontBundle:Subscription:subscribe.html.twig")
     */
    public function subscribeAction($id, Request $request)
    {
        $form = $this->createForm('form', null, ['show_legend' => false]);
        $form->add('coupon', 'text', ['required' => false]);

        $appliedDiscountCode = null;

        /** @var Subscription $subscription */
        $subscription = $this->get('civix_core.subscription_manager')->getSubscription($this->getUser());

        if ('POST' === $request->getMethod() && $form->submit($request)->isValid()) {
            $subscription->setPackageType($id);
            $this->get('civix_core.stripe')->handleSubscription($subscription, $form->getData()['coupon']);

            return $this->redirect($this->generateUrl('civix_front_' . $this->getUser()->getType() .
                '_index'));
        }

        return [
            'hasCard'       => $this->get('civix_core.stripe')->hasCard($this->getUser()),
            'package'       => $this->get('civix_core.subscription_manager')->getPackagesInfo($subscription)[$id],
            'form'          => $form->createView(),
            'discountPrice' => $this->get('civix_core.subscription_manager')
                ->getPackagePrice($id, $appliedDiscountCode),
        ];
    }

    /**
     * @Route("/cancel")
     */
    public function cancelSubscriptionAction(Request $request)
    {
        $this->checkToken($request->get('token'));

        $subscription = $this->get('civix_core.subscription_manager')->getSubscription($this->getUser());
        $this->get('civix_core.stripe')->cancelSubscription($subscription);

        return $this->redirect($this->generateUrl('civix_front_' . $this->getUser()->getType() . '_index'));
    }

    /**
     * @Template("CivixFrontBundle:Subscription:status-widget.html.twig")
     */
    public function statusWidgetAction()
    {
        return [
            'subscription' => $this->get('civix_core.subscription_manager')->getSubscription($this->getUser()),
        ];
    }

    private function checkToken($token)
    {
        if ($token !== $this->getToken()) {
            throw new AccessDeniedHttpException;
        }
    }

    private function getToken()
    {
        return $this->get('form.csrf_provider')->generateCsrfToken('subscriptions');
    }
}
