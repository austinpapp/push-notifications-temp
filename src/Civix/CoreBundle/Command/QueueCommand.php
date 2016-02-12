<?php

namespace Civix\CoreBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class QueueCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('push:queue')
            ->setDescription('Start new process with RabbitMQ daemon')
            ->setHelp('Usage: <info>php app/console push:queue start </info>')
            ->addArgument(
                'method',
                InputArgument::REQUIRED, 'start'
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $childPid = pcntl_fork();

        if ($childPid) {
            $output->writeln('Creating of child fork has been succesfull finished with pid = ' . $childPid);
            exit();
        }

        posix_setsid();

        $rabbitMQCommand = $this->getApplication()->find('rabbitmq:consumer');
        $arguments = array(
            'command' => 'rabbitmq:consumer',
            'name' => 'push'
        );

        $input = new ArrayInput($arguments);
        $rabbitMQCommand->run($input, $output);
    }
}
