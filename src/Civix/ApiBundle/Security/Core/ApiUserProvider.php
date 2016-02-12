<?php

namespace Civix\ApiBundle\Security\Core;

use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Civix\ApiBundle\Security\Authentication\Token\ApiToken;
use \Doctrine\ORM\EntityManager;
use Civix\CoreBundle\Entity\Session;

class ApiUserProvider implements UserProviderInterface
{
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     * {@inheritdoc}
     */
    public function loadUserByUsername($username)
    {
        throw new \LogicException('This provider cannot load user by username.');
    }

    /**
     * {@inheritDoc}
     */
    public function refreshUser(UserInterface $user)
    {
        if (!$user instanceof UserInterface) {
            throw new UnsupportedUserException(sprintf('Instances of "%s" are not supported.', get_class($user)));
        }

        return $user;
    }

    public function loadUserByToken(ApiToken $token)
    {
        if (empty($token->getToken())) {
            return;
        }

        if ($token->getUserType() === 'user') {
            return $this->em->getRepository('CivixCoreBundle:User')
                ->findOneBy(['token' => $token->getToken()]);
        }

        $session = $this->em->getRepository(Session::class)
            ->findOneByToken($token->getToken());

        if ($session) {
            return $this->em
                ->getRepository('CivixCoreBundle:' . ucfirst($session->getUserType()))
                ->find($session->getUserId());
        }

    }

    /**
     * {@inheritDoc}
     */
    public function supportsClass($class)
    {
        return
            $class === 'Civix\CoreBundle\Entity\User' ||
            $class === 'Civix\CoreBundle\Entity\Group' ||
            $class === 'Civix\CoreBundle\Entity\Representative' ||
            $class === 'Civix\CoreBundle\Entity\Superuser'
        ;
    }
}
