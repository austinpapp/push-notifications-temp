<?php

namespace Civix\ApiBundle\Controller\PublicApi;

use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Civix\ApiBundle\Controller\BaseController;
use Civix\CoreBundle\Entity\Poll\Question\PaymentRequest;

/**
 * @Route("/payment-request")
 */
class PaymentRequestController extends BaseController
{
    /**
     * @Route("/{id}", requirements={"id"="\d+"}, name="api_public_payment_request_info")
     * @Method("GET")
     * @ParamConverter(
     *      "paymentRequest",
     *      class="CivixCoreBundle:Poll\Question\PaymentRequest",
     *      options={"repository_method" = "getAllowOutsidersPaymentRequestById"}
     * )
     * @ApiDoc(
     *     resource=true,
     *     description="PaymentRequest",
     *     statusCodes={
     *         200="Returns payment request",
     *         405="Method Not Allowed"
     *     }
     * )
     */
    public function getPaymentRequestById(PaymentRequest $paymentRequest)
    {
        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');

        if (!$paymentRequest->getPublishedAt() || !$paymentRequest->getIsAllowOutsiders()) {
            throw $this->createNotFoundException();
        }

        $response->setContent($this->jmsSerialization(
            $paymentRequest,
            array('api-poll-public'))
        );

        return $response;
    }
}
