<?php
namespace Civix\CoreBundle\Service;

use Symfony\Component\Templating\EngineInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Civix\CoreBundle\Entity\Group;
use Civix\CoreBundle\Entity\User;
use Civix\CoreBundle\Entity\Representative;
use Civix\CoreBundle\Model\User\BetaRequest;
use Civix\CoreBundle\Entity\Poll\Question\PaymentRequest;
use Civix\BalancedBundle\Entity\PaymentHistory;

class EmailSender
{
    private $mailer;
    private $templating;
    private $mailFrom;
    private $mailBetaRequestRecipient;
    private $domain;

    public function __construct(
        \Swift_Mailer $mailer,
        EngineInterface $templating,
        $mailFrom,
        $mailBetaRequestRecipient,
        $domain
    ) {
        $this->mailer = $mailer;
        $this->templating = $templating;
        $this->mailFrom = $mailFrom;
        $this->mailBetaRequestRecipient = $mailBetaRequestRecipient;
        $this->domain = $domain;
    }

    public function sendResetPasswordEmail($emailTo, $templateParams)
    {
        $message = $this->createMessage(
            'Reset password',
            $emailTo,
            'CivixFrontBundle:User:email/reset_password.html.twig',
            $templateParams
        );
        $this->mailer->send($message);
    }

    public function sendInviteFromGroup($emailTo, Group $group)
    {
        $message = $this->createMessage(
            'You’ve been invited to a group on Powerline',
            $emailTo,
            'CivixFrontBundle:Group:email/invite.html.twig',
            array(
                'group' => $group,
                'link' => '#',
            )
        );
        $this->mailer->send($message);
    }

    public function sendRegistrationSuccessGroup(Group $group, $plainPassword)
    {
        $message = $this->createMessage(
            'Group successful registered',
            $group->getManagerEmail(),
            'CivixFrontBundle:Group:email/group_registered.html.twig',
            array(
                'name' => $group->getOfficialName(),
                'username' => $group->getUsername(),
                'password' => $plainPassword
            )
        );
        $this->mailer->send($message);
    }

    public function sendUserRegistrationSuccessGroup(Group $group, $plainPassword)
    {
        $message = $this->createMessage(
            'Group successful registered',
            $group->getManagerEmail(),
            'CivixFrontBundle:Group:email/user_group_registered.html.twig',
            array(
                'name' => $group->getOfficialName(),
                'username' => $group->getUsername(),
                'password' => $plainPassword
            )
        );
        $this->mailer->send($message);
    }

    public function sendNewRepresentativeNotification($emailTo, $representativeTitle)
    {
        $message = $this->createMessage(
            'New Representative Registration',
            $emailTo,
            'CivixFrontBundle:Representative:notification.html.twig',
            array('title' => $representativeTitle)
        );
        $this->mailer->send($message);
    }

    public function sendToApprovedRepresentative(Representative $representative, $username, $password)
    {
        $message = $this->createMessage(
            'Representative Registration approved',
            $representative->getEmail(),
            'CivixFrontBundle:Superuser:email/representative_approved.html.twig',
            array(
                    'name' => $representative->getFirstName() .' ' .$representative->getLastName(),
                    'username' => $username,
                    'password' => $password
            )
        );
        $this->mailer->send($message);
    }

    public function sendBetaRequest(BetaRequest $request)
    {
        $message = $this->createMessage(
            'Beta Request',
            $this->mailBetaRequestRecipient,
            'CivixCoreBundle:Email:beta_request.html.twig',
            compact('request')
        );
        $this->mailer->send($message);
    }

    public function sendRegistrationEmail(User $user)
    {
        $message = $this->createMessage(
            'Welcome to Powerline',
            $user->getEmail(),
            'CivixCoreBundle:Email:registration.html.twig',
            compact('user'),
            'welcome@powerli.ne'
        );
        $this->mailer->send($message);
    }

    public function sendPaymentRequestCharged(
        PaymentHistory $history,
        PaymentRequest $paymentRequest,
        UserInterface $user
    ) {
        $message = $this->createMessage(
            'Your Powerline Payment Receipt',
            $user->getEmail(),
            'CivixCoreBundle:Email:payment_request_charged.html.twig',
            [
                'data' => $history->getDataAsArray(),
                'paymentRequest' => $paymentRequest,
                'user' => $user,
                'transaction_number' => $history->getPublicId(),
                'order_number' => $history->getOrderId()
            ]
        );
        $this->mailer->send($message);
    }

    public function sendSubscriptionCharged(PaymentHistory $history, UserInterface $user, $subscription)
    {
        $message = $this->createMessage(
            'Powerline Payment: ' . $history->getPublicId(),
            $user->getEmail(),
            'CivixCoreBundle:Email:subscription_charged.html.twig',
            compact('user', 'history', 'subscription')
        );
        $this->mailer->send($message);
    }

    public function sendPaymentRequestPublishingCharged(PaymentHistory $history, UserInterface $user)
    {
        $message = $this->createMessage(
            'Powerline Payment: ' . $history->getPublicId(),
            $user->getEmail(),
            'CivixCoreBundle:Email:payment_request_publishing_charged.html.twig',
            compact('user', 'history')
        );
        $this->mailer->send($message);
    }

    public function sendTransactionInfo(PaymentHistory $history, UserInterface $user,  $description = '')
    {
        $message = $this->createMessage(
            'Powerline Payment: ' . $history->getPublicId(),
            $user->getEmail(),
            'CivixCoreBundle:Email:transaction-info.html.twig',
            compact('user', 'history', 'description')
        );
        $this->mailer->send($message);
    }

    public function sendPaymentRequest(PaymentRequest $paymentRequest, UserInterface $user)
    {
        $message = $this->createMessage(
            $paymentRequest->getTitle(),
            $user->getEmail(),
            'CivixCoreBundle:Email:payment_request.html.twig',
            [
                'paymentRequest' => $paymentRequest,
                'user' => $user,
                'domain' => $this->domain
            ]
        );
        $this->mailer->send($message);
    }

    public function sendPaymentRequestOrderPayout(PaymentRequest $paymentRequest, PaymentHistory $history,
                                                  $marketplaceAmount, $customerAmount)
    {
        $message = $this->createMessage(
            'Powerline Payout: ' . $history->getPublicId(),
            $paymentRequest->getUser()->getEmail(),
            'CivixCoreBundle:Email:payment_request_payout.html.twig',
            compact('history', 'paymentRequest', 'marketplaceAmount', 'customerAmount')
        );
        $this->mailer->send($message);
    }


    private function createMessage($subject, $emailTo, $templatePath, $templateParams, $mailFrom = null)
    {
        return \Swift_Message::newInstance()
            ->setSubject($subject)
            ->setFrom($mailFrom ?: $this->mailFrom)
            ->setTo($emailTo)
            ->setBody($this->templating->render(
                $templatePath,
                $templateParams
            ), 'text/html');
    }
}
