<?php

namespace Civix\FrontBundle\Controller\Group;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Civix\FrontBundle\Form\Type\Group\GroupFields;

/**
 * @Route("/fields")
 */
class FieldsController extends Controller
{
    /**
     * @Route("", name="civix_front_group_fields")
     * @Method({"GET"})
     * @Template("CivixFrontBundle:Group:fields/groupfields.html.twig")
     */
    public function fieldsForm()
    {
        $requiredFieldsForm = $this->createForm(new GroupFields(), $this->getUser());

        return array(
            'package' => $this->get('civix_core.subscription_manager')->getPackage($this->getUser()),
            'requiredFieldsForm' => $requiredFieldsForm->createView()
        );
    }

    /**
     * @Route("", name="civix_front_group_fields_update")
     * @Method({"POST"})
     * @Template("CivixFrontBundle:Group:fields/groupfields.html.twig")
     */
    public function updateFields()
    {
        $currenGroup = $this->getUser();
        $fieldsForRemove = $currenGroup->getFields()->toArray();
        $entityManager = $this->getDoctrine()->getManager();

        $requiredFieldsForm = $this->createForm(new GroupFields(), $currenGroup);
        $requiredFieldsForm->bind($this->getRequest());

        if ($requiredFieldsForm->isValid()) {
            // filter $optionForRemove to contain Option no longer present
            foreach ($currenGroup->getFields() as $field) {
                foreach ($fieldsForRemove as $key => $forRemove) {
                    if ($forRemove->getId() === $field->getId()) {
                        unset($fieldsForRemove[$key]);
                    }
                }
            }

            foreach ($fieldsForRemove as $field) {
                $entityManager->remove($field);
            }
            foreach ($currenGroup->getFields() as $field) {
                $field->setGroup($currenGroup);
                $entityManager->persist($field);
            }
            $currenGroup->updateFillFieldsRequired();
            $entityManager->flush();

            $this->get('session')->getFlashBag()->add('notice', 'Required fields have been successfully updated');

            return $this->redirect($this->generateUrl('civix_front_group_fields'));
        }

        return array(
            'package' => $this->get('civix_core.subscription_manager')->getPackage($this->getUser()),
            'requiredFieldsForm' => $requiredFieldsForm->createView()
        );
    }
}
