<?php

namespace Civix\ApiBundle\Features\Context;

use PHPUnit_Framework_Assert as Assert;

use Behat\Behat\Context\BehatContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Doctrine\ORM\EntityManager;
use Civix\CoreBundle\Entity\User;
use Civix\CoreBundle\Entity\Group;
use Civix\CoreBundle\Entity\Representative;
use Civix\CoreBundle\Entity\Superuser;
use Civix\CoreBundle\Entity\UserFollow;
use Civix\CoreBundle\Entity\Session;

class SecureContext extends BehatContext
{
    /**
     * @Given /^A mobile user with username "([^"]*)" and password "([^"]*)"$/
     */
    public function aMobileUserWithUsernameAndPassword($username, $password)
    {
        $this->getMainContext()->callWithData('/api/secure/registration', new PyStringNode(http_build_query([
            'username' => $username,
            'password' => $password,
            'first_name' => $username,
            'last_name' => $username,
            'email' => $username . '@civix.local',
            'address1' => 'test',
            'city' => 'Ocean',
            'state' => 'NJ',
            'zip' => 'test',
            'country' => 'US'
        ])));
        $this->getMainContext()->responseStatusShouldBe(200);
    }

    /**
     * @Given /^Logged in as mobile user "([^"]*)"$/
     */
    public function loggedInAsMobileUser($username)
    {
        $this->getMainContext()
            ->clearHeaders()
            ->setHeader('token', $this->generateUserToken($username));
    }

    /**
     * @Given /^I am logged in as "([^"]*)" superuser$/
     */
    public function iAmLoggedInAsSuperuser($username)
    {
        /* @var $em EntityManager */
        $em = $this->getMainContext()->getEntityManager();
        /* @var $user Superuser */
        $user = $em->getRepository(Superuser::class)->findOneByUsername($username);
        $session = new Session($user);
        $em->persist($session);
        $em->flush($session);
        $this->getMainContext()->clearHeaders()->setHeader(
            'Authorization',
            "Bearer type=\"superuser\" token=\"{$session->getToken()}\""
        );
    }

    /**
     * @Given /^I am logged in as "([^"]*)" group$/
     */
    public function iAmLoggedInAsGroup($username)
    {
        /* @var $em EntityManager */
        $em = $this->getMainContext()->getEntityManager();
        /* @var $user Superuser */
        $user = $em->getRepository(Group::class)->findOneByUsername($username);
        $session = new Session($user);
        $em->persist($session);
        $em->flush($session);
        $this->getMainContext()->clearHeaders()->setHeader(
            'Authorization',
            "Bearer type=\"group\" token=\"{$session->getToken()}\""
        );
    }

    /**
     * @Given /^I am logged in as "([^"]*)" representative$/
     */
    public function iAmLoggedInAsRepresentative($username)
    {
        /* @var $em EntityManager */
        $em = $this->getMainContext()->getEntityManager();
        /* @var $user Superuser */
        $user = $em->getRepository(Representative::class)->findOneByUsername($username);
        $session = new Session($user);
        $em->persist($session);
        $em->flush($session);
        $this->getMainContext()->clearHeaders()->setHeader(
            'Authorization',
            "Bearer type=\"representative\" token=\"{$session->getToken()}\""
        );
    }

    /**
     * @Given /^user "([^"]*)" has groups:$/
     */
    public function userHasGroups($username, TableNode $table)
    {
        /* @var $em EntityManager */
        $em = $this->getMainContext()->getEntityManager();
        /* @var $user User */
        $user = $em->getRepository(User::class)->findOneByUsername($username);

        $hash = $table->getHash();
        foreach ($hash as $row) {
            /* @var $group Group */
            $group = $em->getRepository(Group::class)->findOneByUsername($row['username']);
            Assert::assertNotNull($group);
            Assert::assertTrue($user->getGroups()->contains($group));
        }
    }

    /**
     * @Given /^user "([^"]*)" has representative district "([^"]*)"$/
     */
    public function userHasRepresentativeDistrict($username, $representative)
    {
        /* @var $em EntityManager */
        $em = $this->getMainContext()->getEntityManager();
        /* @var $user User */
        $user = $em->getRepository(User::class)->findOneByUsername($username);
        /* @var $representative Representative */
        $representative = $em->getRepository(Representative::class)->findOneByUsername($representative);
        $user->addDistrict($representative->getDistrict());
        $em->flush($user);
    }

    /**
     * @Given /^"([^"]*)" follow "([^"]*)"$/
     */
    public function follow($username1, $username2)
    {
        /* @var $em EntityManager */
        $em = $this->getMainContext()->getEntityManager();
        /* @var $user User */
        $user1 = $em->getRepository(User::class)->findOneByUsername($username1);
        /* @var $user User */
        $user2 = $em->getRepository(User::class)->findOneByUsername($username2);
        $userFollow = (new UserFollow())
            ->setUser($user2)
            ->setFollower($user1)
            ->setStatus(UserFollow::STATUS_ACTIVE)
            ->setDateCreate(new \DateTime)
        ;
        $em->persist($userFollow);
        $em->flush($userFollow);
    }

    public function generateUserToken($username)
    {
        /* @var $em EntityManager */
        $em = $this->getMainContext()->getEntityManager();
        /* @var $user User */
        $user = $em->getRepository(User::class)->findOneByUsername($username);
        $user->generateToken();
        $em->flush($user);

        return $user->getToken();
    }

}
