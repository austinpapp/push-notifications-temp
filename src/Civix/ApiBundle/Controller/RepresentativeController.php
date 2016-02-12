<?php

namespace Civix\ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Civix\CoreBundle\Entity\RepresentativeStorage;

/**
 * @Route("/representatives")
 */
class RepresentativeController extends BaseController
{

     /**
     * @Route("/", name="api_my_representatives")
     * @Method("GET")
     *
     * @ApiDoc(
     *     resource=true,
     *     description="Get list of representatives grouped by district types",
     *     statusCodes={
     *         200="Returns list representatives",
     *         401="Authorization required",
     *         405="Method Not Allowed"
     *     }
     * )
     */
    public function getMyRepresentativesAction()
    {
        $entityManager = $this->getDoctrine()->getManager();

        $districts = $this->getUser()->getDistrictsIds();
        $nonLegislativeRepr = $entityManager->getRepository('CivixCoreBundle:Representative')
                ->getNonLegislativeRepresentative($districts);
        $representatives = $entityManager->getRepository('CivixCoreBundle:RepresentativeStorage')
                ->getSTRepresentativeListByUser($districts);

        $reprByDistrict = array();

        if ($nonLegislativeRepr) {
            $nonLegislativeRepr = array_map(function ($representativeInfo) {
                    return array('representative' => $representativeInfo);
            }, $nonLegislativeRepr);
            $reprByDistrict['Local'] = array(
                'title' => 'Local',
                'representatives' => $nonLegislativeRepr
            );
        }

        foreach ($representatives as $singleRepresentative) {
            if (empty($reprByDistrict[$singleRepresentative->getDistrictTypeName()])) {
                $reprByDistrict[$singleRepresentative->getDistrictTypeName()] = array(
                    'title' => $singleRepresentative->getDistrictTypeName(),
                    'representatives' => array(),
                );
            }
            if ($singleRepresentative->getRepresentative() && $singleRepresentative->getRepresentative()->getAvatar()) {
                $singleRepresentative->getRepresentative()->setAvatarFilePath(
                    $this->getDomain() . $this->get('vich_uploader.templating.helper.uploader_helper')
                        ->asset($singleRepresentative->getRepresentative(), 'avatar'));
            }
            $reprByDistrict[$singleRepresentative->getDistrictTypeName()]['representatives'][] = $singleRepresentative;
        }

        $response = new Response($this->jmsSerialization(array_values($reprByDistrict),
            array('api-representatives-list'))
        );
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    private function getDomain()
    {
        $request = $this->getRequest();

        return $request->getScheme() . '://' .$request->getHttpHost();
    }

    /**
     * @Route(
     *  "/info/{representative_id}/{storage_id}",
     *   name="api_representative_information",
     *   requirements={
     *      "representative_id" = "\d+",
     *      "storage_id" = "\d+"
     *   }
     * )
     * @Method("GET")
     *
     * @ApiDoc(
     *     resource=true,
     *     description="Get information on representative",
     *     statusCodes={
     *         200="Get information on representative",
     *         401="Authorization required",
     *         405="Method Not Allowed"
     *     }
     * )
     */
    public function getInformationAction(Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $info = $entityManager->getRepository('CivixCoreBundle:Representative')
                ->getRepresentativeInformation($request->get('representative_id'), $request->get('storage_id'));

        if (!($info)) {
            throw $this->createNotFoundException();
        }

        $response = new Response($this->jmsSerialization($info, array('api-info')));
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    /**
     * @Route(
     *      "/info/committee/{storage_id}",
     *      name="api_representative_committee",
     *      requirements={
     *          "storage_id" = "\d+"
     *      }
     * )
     * @ParamConverter(
     *      "representative",
     *      class="CivixCoreBundle:RepresentativeStorage",
     *      options={"id" = "storage_id"}
     * )
     * @Method("GET")
     *
     * @ApiDoc(
     *     resource=true,
     *     description="Get committee membership of representative",
     *     statusCodes={
     *         200="Get committee membership of representative",
     *         401="Authorization required",
     *         405="Method Not Allowed"
     *     }
     * )
     */
    public function getCommitteeInfo(RepresentativeStorage $representative)
    {
        $responseBody = array();
        $openStateId = $representative->getOpenstateId();
        if ($openStateId) {
            $responseBody = $this->get('civix_core.openstates_api')
                ->getCommiteeMembership($openStateId);
        }
        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        $response->setContent($this->jmsSerialization($responseBody, 'api-committee'));

        return $response;
    }

    /**
     * @Route(
     *      "/info/sponsored-bills/{storage_id}",
     *      name="api_representative_sponsored_bills",
     *      requirements={
     *          "storage_id" = "\d+"
     *      }
     * )
     * @ParamConverter(
     *      "representative", 
     *      class="CivixCoreBundle:RepresentativeStorage",
     *      options={"id" = "storage_id"}
     * )
     * @Method("GET")
     *
     * @ApiDoc(
     *     resource=true,
     *     description="Get sponsored bills by representative",
     *     statusCodes={
     *         200="Get ponsored bills by representative",
     *         401="Authorization required",
     *         405="Method Not Allowed"
     *     }
     * )
     */
    public function getSponsoredBills(RepresentativeStorage $representative)
    {
        $responseBody = array();
        $openStateId = $representative->getOpenstateId();
        if ($openStateId) {
            $responseBody = $this->get('civix_core.openstates_api')
                ->getBillsBySponsorId($openStateId);
        }

        $response = new Response();
        $response->setContent($this->jmsSerialization($responseBody, 'api-bills'));
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }
}
