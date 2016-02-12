<?php

namespace Civix\FrontBundle\Features\Context;

use Symfony\Component\HttpKernel\KernelInterface;
use Behat\Symfony2Extension\Context\KernelAwareInterface;
use Behat\MinkExtension\Context\MinkContext;

class FeatureContext extends MinkContext implements KernelAwareInterface
{
    private $kernel;
    private $parameters;

    /**
     * Initializes context with parameters from behat.yml.
     *
     * @param array $parameters
     */
    public function __construct(array $parameters)
    {
        $this->parameters = $parameters;
    }

    /**
     * Sets HttpKernel instance.
     * This method will be automatically called by Symfony2Extension ContextInitializer.
     *
     * @param KernelInterface $kernel
     */
    public function setKernel(KernelInterface $kernel)
    {
        $this->kernel = $kernel;
    }

    /**
     * @Given /^(?:|I )am logged in as Administrator$/
     */
    public function iAmLoggedInAsAdministrator()
    {
        $this->visit('/superuser/login');
        $this->fillField('_username', 'admin');
        $this->fillField('_password', 'admin');
        $this->pressButton('login');
    }

    /**
     * @Given /^(?:|I )am logged in as Representative$/
     */
    public function iAmLoggedInAsRepresentative()
    {
        $this->visit('/representative/login');
        $this->fillField('_username', 'testrepresentative');
        $this->fillField('_password', 'testrepresentative7ZAPe3QnZhbdec');
        $this->pressButton('login');
    }

    /**
     * @Given /^(?:|I )am logged in as Group$/
     */
    public function iAmLoggedInAsGroup()
    {
        $this->visit('/group/login');
        $this->fillField('_username', 'testgroup');
        $this->fillField('_password', 'testgroup7ZAPe3QnZhbdec');
        $this->pressButton('login');
    }
}
