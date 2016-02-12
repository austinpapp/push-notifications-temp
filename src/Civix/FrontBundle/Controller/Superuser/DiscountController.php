<?php

namespace Civix\FrontBundle\Controller\Superuser;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Civix\CoreBundle\Entity\Subscription\DiscountCode;
use Civix\FrontBundle\Form\Type\Superuser\DiscountCode as DiscountForm;

/**
 * @Route("/discounts")
 */
class DiscountController extends Controller
{
    /**
     * @Route("")
     * @Method("GET")
     * @Template("CivixFrontBundle:Discount:index.html.twig")
     */
    public function indexAction(Request $request)
    {
        $limit  = 30;
        $after  = $request->query->get('after', null);
        $before = $request->query->get('before', null);
        
        return [
            'limit'   => $limit,
            'after'   => $after,
            'before'  => $before,
            'coupons' => $this->get('civix_core.stripe')->getCoupons(
                $limit,
                $after,
                $before
            ),

        ];
    }

    /**
     * @Route("/new")
     * @Template("CivixFrontBundle:Discount:new.html.twig")
     * @deprecated
     */
    public function newAction(Request $request)
    {
        $code = new DiscountCode();
        $form = $this->createForm(new DiscountForm(), $code);

        if ('POST' === $request->getMethod()) {
            $form->handleRequest($request);
            if ($form->isValid()) {
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($code);
                $entityManager->flush();
                $this->get('session')->getFlashBag()->add('success', 'The code has been successfully saved');

                return $this->redirect(
                    $this->generateUrl('civix_front_superuser_discount_index')
                );
            }
        }
        
        return [
            'form' => $form->createView()
        ];
    }

    /**
     * @Route("/edit/{id}", requirements={"id"="\d+"})
     * @Template("CivixFrontBundle:Discount:edit.html.twig")
     * @deprecated
     */
    public function editAction(DiscountCode $code, Request $request)
    {
        $form = $this->createForm(new DiscountForm(), $code);

        if ('POST' === $request->getMethod()) {
            $form->handleRequest($request);
            if ($form->isValid()) {
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($code);
                $entityManager->flush();
                $this->get('session')->getFlashBag()->add('success', 'The code has been successfully saved');

                return $this->redirect(
                    $this->generateUrl('civix_front_superuser_discount_index')
                );
            }
        }
        
        return [
            'form' => $form->createView()
        ];
    }

    /**
     * @Route("/delete/{id}", requirements={"id"="\d+"})
     * @deprecated
     */
    public function deleteAction(DiscountCode $code, Request $request)
    {
        if ($request->get('token') !== $this->getToken()) {
            throw new AccessDeniedHttpException();
        }
        $manager = $this->getDoctrine()->getManager();
        $manager->remove($code);
        $manager->flush();
        $this->get('session')->getFlashBag()->add('success', 'The code has been successfully removed');

        return $this->redirect(
            $this->generateUrl('civix_front_superuser_discount_index')
        );
    }
    
    protected function getToken()
    {
        return $this->get('form.csrf_provider')->generateCsrfToken('discount_codes');
    }
}
