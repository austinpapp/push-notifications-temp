<?php

namespace Civix\CoreBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Output\OutputInterface;
use Civix\CoreBundle\Service\Subscription\SubscriptionManager;
use Civix\CoreBundle\Service\Customer\CustomerManager;
use Civix\CoreBundle\Entity\Customer\Card;
use Civix\CoreBundle\Entity\Customer\Customer;
use Civix\CoreBundle\Entity\Subscription\Subscription;
use Civix\CoreBundle\Entity\Subscription\DiscountCodeHistory;

class RenewalSubscriptionDaemonCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('subscriptions-renew:start')
            ->setDescription('Renew subscription daemon')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $exit = false;
        $stop = function ($signo) use ($output, &$exit) {
            $output->writeln("<comment>Signal: $signo</comment>");
            switch ($signo) {
                case SIGTERM:
                    $exit = true;
                    break;
                case SIGKILL:
                    $exit = true;
                    break;
                case SIGINT:
                    $exit = true;
                    break;
                default:
                    $output->writeln("<error>Unused signal</error>");
            }
        };

        pcntl_signal(SIGTERM, $stop);
        pcntl_signal(SIGINT, $stop);

        while (true) {

            /** @var \Doctrine\ORM\EntityManager $em */
            $em = $this->getContainer()->get('doctrine.orm.entity_manager');
            /** @var SubscriptionManager $sm */
            $sm = $this->getContainer()->get('civix_core.subscription_manager');
            /** @var CustomerManager $cm */
            $cm = $this->getContainer()->get('civix_core.customer_manager');
            /** @var \Swift_Mailer $mailer */
            $mailer = $this->getContainer()->get('mailer');

            $subscriptions = $em->getRepository(Subscription::class)->findForRenew();

            if (count($subscriptions)) {
                /** @var Subscription $subscription */
                foreach ($subscriptions as $subscription) {
                    pcntl_signal_dispatch();
                    if ($exit) {
                        $output->writeln('<info>Safe exit (working mode)</info>');
                        exit();
                    }
                    $originalExpiredAt = clone $subscription->getExpiredAt();
                    try {
                        $output->writeln("<comment>Renew subscription: </comment>");
                        $output->writeln("<info>{$subscription->getId()} {$subscription->getLabel()}</info>");

                        $subscription->setNextPaymentAt(clone $subscription->getExpiredAt());
                        $subscription->getNextPaymentAt()->add(new \DateInterval('P30D'));
                        $em->flush($subscription);

                        /* @var Customer $customer */
                        $customer = $cm->getCustomerByUser($subscription->getUserEntity());
                        
                        $appliedDiscountCode = $em->getRepository(DiscountCodeHistory::class)
                            ->findAppropriateCode($customer, $subscription->getPackageType());
                        $paymentHistory = $sm->handleSubscriptionPurchase($subscription->getCard(), $customer, $subscription, $appliedDiscountCode);
                        if (!$paymentHistory->isSucceeded()) {
                            $subscription->setEnabled(false);
                            $em->flush($subscription);
                            $output->writeln("<error>Cannot charge</error>");
                        } else {
                            $output->writeln("<info>Success. Transaction number: {$paymentHistory->getPublicId()}</info>");
                        }

                    } catch (\Exception $e) {
                        $output->writeln("<error>{$e->getMessage()}</error>");
                        $subscription->setExpiredAt($originalExpiredAt);
                        $subscription->setEnabled(false);
                        $em->flush($subscription);
                    }
                }

            } else {
                pcntl_signal_dispatch();
                if ($exit) {
                    $output->writeln('<info>Safe exit (waiting mode)</info>');
                    exit();
                }
                $output->writeln("<comment>Waiting...</comment>");
                sleep(60);
            }
            $em->clear();

            try {
                $spool = $mailer->getTransport()->getSpool();
                $transport = $this->getContainer()->get('swiftmailer.transport.real');
                $spool->flushQueue($transport);
                $transport->stop();
            } catch (\Exception $e) {
                $output->writeln("<error>{$e->getMessage()}</error>");
            }
        }
    }
}
