<?php

namespace Civix\ApiBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
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
        $dto = $this->getJson();
        if (empty($dto->source)) {
            throw new BadRequestHttpException;
        }
        $this->get('civix_core.stripe')
            ->addCard($this->getUser(), $dto->source);

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