<?php

namespace Civix\FrontBundle\Controller\Group;

use Civix\FrontBundle\Controller\PetitionController as Controller;
use Civix\CoreBundle\Entity\Poll\Question\Petition;
use Civix\CoreBundle\Entity\Customer\Card;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/petitions")
 */
class PetitionController extends Controller
{
    public function getPetitionClass()
    {
        return '\Civix\CoreBundle\Entity\Poll\Question\GroupPetition';
    }

    public function getPetitionFormClass()
    {
        if (!$this->isAvailableGroupSection()) {
            return '\Civix\FrontBundle\Form\Type\Poll\Petition';
        }

        return '\Civix\FrontBundle\Form\Type\Poll\PetitionGroup';
    }
    
    /**
     * @Route("/invite/{id}", requirements={"id"="\d+"})
     * @Template("CivixFrontBundle:Petition:invite.html.twig")
     * @ParamConverter(
     *      "petition",
     *      class="CivixCoreBundle:Poll\Question\Petition",
     *      options={"repository_method" = "getPublishPetitonById"}
     * )
     */
    public function inviteAction(Request $request, Petition $petition)
    {
        $group = $this->getUser();
        if ($petition->getUser() !== $group ||
            $request->get('token') !== $this->getToken()
        ) {
            throw new AccessDeniedHttpException();
        }

        $answers = $this->getDoctrine()->getManager()
            ->getRepository('CivixCoreBundle:Poll\Question\Petition')
            ->getSignedUsersNotInGroup($petition, $group);

        if (!empty($answers)) {
            $package = $this->get('civix_core.subscription_manager')
                ->getPackage($this->getUser());
            $packageInviteAmount = $package->getSumForPetitionInvites();
            
            if (0 < $packageInviteAmount) {
                /* @var Customer $customer */
                $customer = $this->get('civix_core.customer_manager')
                    ->getCustomerByUser($this->getUser());
                /* @var Card $card */
                $card = $this->getDoctrine()->getRepository(Card::class)
                    ->findOneByCustomer($customer);

                if (!$card) {
                    return $this->redirect(
                        $this->generateUrl('civix_front_' . $this->getUser()->getType() . '_paymentsettings_createcard', [
                            'return_path' => $this->generateUrl('civix_front_' . $this->getUser()->getType() .
                                    '_invite', ['id' => $petition->getId()])
                        ])
                    );
                }
                $form = $this->createForm('form');
                if ('POST' === $request->getMethod() && $form->submit($request)->isValid()) {
                    $paymentHistory = $this->get('civix_core.payments')
                        ->buyPetitionsInvites($card, $customer, $packageInviteAmount * 100);
                    if (!$paymentHistory->isSucceeded()) {
                        return $this->redirect($this->generateUrl(
                            "civix_front_{$this->getUser()->getType()}_invite",
                            ['id' => $petition->getId()])
                        );
                    }
                } else {
                    return [
                        'card' => $card,
                        'price' => $packageInviteAmount,
                        'form' => $form->createView(),
                    ];
                }
            }
            
            $this->get('civix_core.invite_sender')
                ->sendInviteForPetition($answers, $group);
            $this->getDoctrine()->getManager()->persist($group);
            $this->getDoctrine()->getManager()->flush();

            $this->get('session')->getFlashBag()
                ->add('notice', 'Invites have been sent');
        } else {
            $this->get('session')->getFlashBag()
                ->add('error', 'Signed users have not been found');
        }

        return $this->redirect($this->generateUrl("civix_front_{$this->getUser()->getType()}_petition_index"));
    }
}
