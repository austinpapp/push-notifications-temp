<?php

namespace Civix\FrontBundle\Controller\Group;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Civix\FrontBundle\Controller\ReportContoller as Controller;
use Civix\CoreBundle\Entity\User;
use Civix\CoreBundle\Entity\UserGroup;
use Civix\CoreBundle\Entity\Group\GroupField;
use Civix\CoreBundle\Entity\Group;

/**
 * @Route("/reports")
 */
class ReportController extends Controller
{
    public function getQuestionClass()
    {
        return 'CivixCoreBundle:Poll\Question\Group';
    }

    public function getEventClass()
    {
        return 'CivixCoreBundle:Poll\Question\GroupEvent';
    }

    public function getPaymentRequestClass()
    {
        return 'CivixCoreBundle:Poll\Question\GroupPaymentRequest';
    }

    /**
     * @Route("/membership")
     * @Method({"GET"})
     * @Template("CivixFrontBundle:Reports:membership.html.twig")
     */
    public function membershipAction(Request $request)
    {
        $query = $this->getDoctrine()->getRepository(UserGroup::class)
            ->getMembershipReportQuery($this->getUser(), UserGroup::STATUS_ACTIVE);
        $pagination = $this->get('knp_paginator')->paginate(
            $query,
            $request->get('page', 1),
            10
        );

        return [
            'pagination' => $pagination,
            'token' => $this->getToken(),
            'group' => $this->getUser(),
        ];
    }

    /**
     * @Route("/membership/download")
     */
    public function downloadMembershipAction()
    {
        $date = new \DateTime();

        /* @var Group $group */
        $group = $this->getUser();

        $members = $this->getDoctrine()->getRepository(UserGroup::class)
            ->getMembershipReportQuery($this->getUser(), UserGroup::STATUS_ACTIVE)
            ->getResult();


        $data = [];
        $header = ['Name', 'Address', 'Email', 'Phone Number', 'Facebook'];
        foreach ($group->getFields() as $field) {
            $header[] = $field->getFieldName();
        }
        $header[] = 'Join date';$header[] = 'Followers';

        $data[] = $header;
        foreach ($members as $mr) {
            $data[] = $mr[0]->getUserDataRow();
        }

        $response = new Response($this->createCSVString($data));
        $filename = "membership_".$date->format("Y_m_d_His").".csv";
        $response->headers->set('Content-Type', 'text/csv');
        $response->headers->set('Content-Disposition', 'attachment; filename='.$filename);

        return $response;
    }

    public function fieldsAction(User $user, $format = 'html')
    {
        $entityManager = $this->getDoctrine()->getManager();
        $fieldValues = $entityManager->getRepository('CivixCoreBundle:Group\FieldValue')
            ->getFieldsValuesByUser($user, $this->getUser());

        return $this->render(
            'CivixFrontBundle:Reports:fields.'.$format.'.twig',
            [
                'fieldValues' => $fieldValues,
                'package' => $this->get('civix_core.subscription_manager')->getPackage($this->getUser()),
            ]
        );   
    }

    private function createCSVString(array $data)
    {
        $result = '';
        foreach ($data as $row) {
            $result .= implode(',', array_map(function($item) {
                return '"' . str_replace('"', '""', $item) . '"';
            }, $row)) . "\n";
        }
        return $result;
    }
}
