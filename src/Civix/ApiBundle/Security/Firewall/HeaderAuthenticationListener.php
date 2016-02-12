<?php

namespace Civix\ApiBundle\Security\Firewall;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\Security\Http\Firewall\ListenerInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\SecurityContextInterface;
use Symfony\Component\Security\Core\Authentication\AuthenticationManagerInterface;
use Civix\ApiBundle\Security\Authentication\Token\ApiToken;

class HeaderAuthenticationListener implements ListenerInterface
{
    protected $securityContext;
    protected $authenticationManager;

    public function __construct(
        SecurityContextInterface $securityContext,
        AuthenticationManagerInterface $authenticationManager
    ) {
        $this->securityContext = $securityContext;
        $this->authenticationManager = $authenticationManager;
    }

    public function handle(GetResponseEvent $event)
    {
        $request = $event->getRequest();
        $apiToken = null;

        if ($request->headers->has('Token')) {
            $apiToken = new ApiToken();
            $apiToken->setToken($request->headers->get('Token'), 'user');
        } else if ($request->headers->has('Authorization')) {
            $isTokenAuth = preg_match(
                '/^Bearer type="(?P<type>\S+?)"\s+token="(?P<token>\S+?)"$/i',
                $request->headers->get('Authorization'),
                $matches
            );
            if ($isTokenAuth) {
                $apiToken = new ApiToken();
                $apiToken->setToken($matches['token'], $matches['type']);
            }
        }

        if (!$apiToken) {
            $response = new Response();
            $response->setStatusCode(401, 'Authentication required.');
            $event->setResponse($response);

            return;
        }

        try {
            $authToken = $this->authenticationManager->authenticate($apiToken);

            $this->securityContext->setToken($authToken);
        } catch (AuthenticationException $failed) {

            $response = new Response();
            $response->setStatusCode(401, 'Incorrect Token.');
            $event->setResponse($response);
        }
    }
}
