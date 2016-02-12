<?php

namespace Civix\CoreBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Output\OutputInterface;

use Civix\CoreBundle\Entity\Poll\Question\PaymentRequest;

use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Component\Console\Input\ArgvInput;

class ChargePaymentRequestDaemonCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('payment-request:start')
            ->setDescription('Charging crowdfunding payment requests')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        while (true) {

            /** @var \Doctrine\ORM\EntityManager $em */
            $em = $this->getContainer()->get('doctrine.orm.entity_manager');

            $payments = $em->getRepository(PaymentRequest::class)->findChargeNeeded();

            $foundCount = count($payments);
            $output->writeln("<comment>Found to charge: $foundCount</comment>");
            $kernel = new \AppKernel('prod', false);
            $application = new Application($kernel);
            $application->setAutoExit(false);

            foreach ($payments as $payment) {
                $output->writeln("<comment>Start charging: {$payment->getId()}</comment>");
                $application->run(new ArgvInput(array('', 'payment-request:charge', $payment->getId())));
                $output->writeln("<comment>Payment {$payment->getId()} has charged</comment>");
            }
            $kernel->shutdown();
            $em->clear();
            sleep(60);
        }

        $output->writeln('Started.');
    }
}
