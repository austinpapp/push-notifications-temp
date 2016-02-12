<?php

namespace Civix\ApiBundle\Controller\Leader;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Civix\ApiBundle\Controller\BaseController;
use Civix\CoreBundle\Entity\Stripe\Customer;

/**
 * @Route("/cards")
 */
class CardsController extends BaseController
{
    /**
     * @Route("/")
     * @Method("POST")
     */
    public function add()
    {
        $this->get('civix_core.stripe')
            ->addCard($this->getUser(), $this->getJson()->source);

        return $this->createJSONResponse($this->jmsSerialization([], ['api']));
    }

    /**
     * @Route("/")
     * @Method("GET")
     */
    public function listCards()
    {
        $cards = [];
        /* @var Customer $customer */
        $customer = $this->getDoctrine()
            ->getRepository(Customer::getEntityClassByUser($this->getUser()))
            ->findOneBy(['user' => $this->getUser()]);
        if ($customer) {
            $cards = $customer->getCards();
        }

        return $this->createJSONResponse($this->jmsSerialization($cards, ['api']));
    }

    /**
     * @Route("/{id}")
     * @Method("DELETE")
     */
    public function removeCard($id)
    {
        $customer = $this->getDoctrine()
            ->getRepository(Customer::getEntityClassByUser($this->getUser()))
            ->findOneBy(['user' => $this->getUser()]);
        if ($customer) {
            $this->get('civix_core.stripe')->removeCard($customer, $id);
        }

        return $this->createJSONResponse(null, 204);
    }
}