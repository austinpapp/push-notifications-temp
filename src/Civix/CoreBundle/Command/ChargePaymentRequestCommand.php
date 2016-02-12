<?php

namespace Civix\CoreBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Output\OutputInterface;
use Civix\CoreBundle\Entity\Poll\Question\PaymentRequest;
use Civix\CoreBundle\Entity\Poll\Answer;

use Civix\CoreBundle\Service\Stripe;
use Civix\CoreBundle\Entity\Stripe\Charge;
use Civix\CoreBundle\Entity\Stripe\Customer;


class ChargePaymentRequestCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('payment-request:charge')
            ->setDescription('Charging crowdfunding payment requests')
            ->addArgument(
                'id',
                InputArgument::REQUIRED,
                'Payment request id'
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /** @var PaymentRequest $paymentRequest */
        $paymentRequest = $this->getContainer()->get('doctrine')->getRepository(PaymentRequest::class)
            ->find($input->getArgument('id'));

        if (!$paymentRequest || !$paymentRequest->getIsCrowdfunding()) {
            return $output->writeln('<error>Cannot find payment request.</error>');
        }

        if (!$paymentRequest->isCrowdfundingDeadline()) {
            return $output->writeln('<error>Deadline is not reached.</error>');
        }

        /** @var Stripe $stripe */
        $stripe =  $this->getContainer()->get('civix_core.stripe');


        /** @var \Doctrine\ORM\EntityRepository $chargeRepository */
        $chargeRepository = $this->getContainer()->get('doctrine')->getRepository(Charge::class);

        /** @var \Doctrine\ORM\EntityManager $em */
        $em = $this->getContainer()->get('doctrine.orm.entity_manager');

        if ($paymentRequest->getCrowdfundingGoalAmount() > $paymentRequest->getCrowdfundingPledgedAmount()) {
            $paymentRequest->setIsCrowdfundingCompleted(true);
            $em->flush($paymentRequest);

            return;
        }

        /** @var Answer $answer */
        foreach ($paymentRequest->getAnswers() as $answer) {
            $customer = $this->getContainer()->get('doctrine')
                ->getRepository(Customer::getEntityClassByUser($answer->getUser()))
                ->findOneBy(['user' => $answer->getUser()]);

            if (!$customer) {
                continue;
            }

            $charge = $chargeRepository->findOneBy([
                    'questionId' => $answer->getQuestion()->getId(),
                    'fromCustomer' => $customer,
                ])
            ;


            if ($answer->getOption()->getPaymentAmount() && !$charge) {
                try {
                    $stripe->chargeToPaymentRequest($paymentRequest, $answer, $answer->getUser());
                    $output->writeln("<comment>User {$answer->getUser()->getId()} has charged</comment>");
                } catch (\Exception $e) {
                    $output->writeln("<error>{$e->getMessage()}</error>");
                }
            } else {
                $output->writeln("<comment> Already paid: {$answer->getUser()->getId()} </comment>");
            }
        }

        $paymentRequest->setIsCrowdfundingCompleted(true);
        $em->flush($paymentRequest);

        $output->writeln('Charged.');
    }
}
