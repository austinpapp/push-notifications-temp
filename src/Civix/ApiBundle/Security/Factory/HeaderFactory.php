<?php

namespace Civix\ApiBundle\Security\Factory;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\DefinitionDecorator;
use Symfony\Component\Config\Definition\Builder\NodeDefinition;
use Symfony\Bundle\SecurityBundle\DependencyInjection\Security\Factory\SecurityFactoryInterface;

class HeaderFactory implements SecurityFactoryInterface
{
    public function create(ContainerBuilder $container, $id, $config, $userProvider, $defaultEntryPoint)
    {
        $providerId = 'security.authentication.provider.header.'. $id;
        $container
            ->setDefinition($providerId, new DefinitionDecorator('api.security.authentication.provider'))
        ;

        $listenerId = 'security.authentication.listener.header.'.$id;
        $listener = $container->setDefinition(
            $listenerId,
            new DefinitionDecorator('api.security.authentication.listener')
        );

        return array($providerId, $listenerId, $defaultEntryPoint);
    }

    public function getPosition()
    {
        return 'pre_auth';
    }

    public function getKey()
    {
        return 'header';
    }

    public function addConfiguration(NodeDefinition $node)
    {
    }
}
