<?php
namespace Civix\ApiBundle\Features\Context;

use Symfony\Component\HttpKernel\KernelInterface;
use Behat\Symfony2Extension\Context\KernelAwareInterface;
use Behat\Behat\Context\BehatContext;
use Behat\Behat\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Buzz\Browser;
use Buzz\Client\Curl;
use Buzz\Message\Response;

use PHPUnit_Framework_Assert as Assert;

/**
 * Feature context.
 */
class FeatureContext extends BehatContext //MinkContext if you want to test web
                  implements KernelAwareInterface
{
    /**
     * @var KernelInterface
     */
    private $kernel;
    private $parameters;
    /**
     * @var Browser
     */
    private $browser;

    /**
     * @var Response
     */
    private $lastResponse;

    private $headers = [];

    /**
     * Initializes context with parameters from behat.yml.
     *
     * @param array $parameters
     */
    public function __construct(array $parameters)
    {
        $this->parameters = $parameters;

        $curlBuzzClient = new Curl();
        $curlBuzzClient->setTimeout(30);
        $curlBuzzClient->setOption(CURLOPT_SSL_VERIFYHOST, 0);
        $curlBuzzClient->setOption(CURLOPT_SSL_VERIFYPEER, 0);

        $this->browser = new Browser($curlBuzzClient);
        $this->useContext('secure', new SecureContext());
        $this->useContext('activity', new ActivityContext());
        $this->useContext('group', new GroupContext());
        $this->useContext('poll', new PollContext());
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
     * @return Browser
     */
    public function getBrowser()
    {
        return $this->browser;
    }

    /**
     * @return \Symfony\Component\DependencyInjection\ContainerInterface
     */
    public function getContainer()
    {
        return $this->kernel->getContainer();
    }

    /**
     * @return Response
     */
    public function getLastResponse()
    {
        return $this->lastResponse;
    }

    /**
     * Return doctrine manager instance
     *
     * @return \Doctrine\Common\Persistence\ObjectManager
     */
    public function getEntityManager()
    {
        return $this->getContainer()->get('doctrine')->getManager();
    }

    /**
     * @When /^call POST "([^"]*)" with data:$/
     */
    public function callWithData($url, PyStringNode $string)
    {
        $this->callPOST($this->getAbsoluteUrl($url), $string->getRaw());
    }

    /**
     * @When /^call GET "([^"]*)"$/
     */
    public function callGetQuery($url)
    {
        $this->callGET($this->getAbsoluteUrl($url));
    }

    /**
     * @When /^call DELETE "([^"]*)"$/
     */
    public function callDelete2($url)
    {
        $this->callDELETE($this->getAbsoluteUrl($url));
    }

    /**
     * @When /^call PUT "([^"]*)" with data:$/
     */
    public function callPutWithData($url, PyStringNode $string)
    {
        $this->callPUT($this->getAbsoluteUrl($url), $string->getRaw());
    }

    /**
     * @Then /^json response should be:$/
     */
    public function jsonResponseShouldBe(PyStringNode $string)
    {
        \Isdev\Assert\Assertion::jsonStringMatchJsonString($string->getRaw(), $this->getLastResponse()->getContent());
    }

    /**
     * @Then /^response status should be "([^"]*)"$/
     */
    public function responseStatusShouldBe($status)
    {
        try {
            Assert::assertEquals($status, $this->getLastResponse()->getStatusCode());
        } catch (\PHPUnit_Framework_ExpectationFailedException $e) {
            $class = get_class($e);
            throw new $class($e->getMessage() . "\n" . $this->getLastResponse()->getContent(),
                $e->getComparisonFailure());
        }
    }

    /**
     * Prints last response body.
     *
     * @Then print response
     */
    public function printResponse()
    {
        $response = $this->lastResponse;
        echo sprintf(
            "%d => :\n%s",
            $response->getStatusCode(),
            $response->getContent()
        );
    }

    public function callGET($url, $headers = [])
    {
        $this->lastResponse = $this->getBrowser()->get($url, array_merge($this->headers, $headers));
    }

    public function callPOST($url, $content = '', $headers = [])
    {
        $this->lastResponse = $this->getBrowser()->post($url, array_merge($this->headers, $headers), $content);
    }

    public function callPUT($url, $content = '', $headers = [])
    {
        $this->lastResponse = $this->getBrowser()->put($url, array_merge($this->headers, $headers), $content);
    }

    public function callDELETE($url,  $content = '', $headers = [])
    {
        $this->lastResponse = $this->getBrowser()->delete($url, array_merge($this->headers, $headers), $content);
    }

    public function getAbsoluteUrl($url)
    {
        return $this->parameters['base_url'] . $url;
    }

    public function setHeader($key, $value)
    {
        $this->headers[$key] = $value;
    }

    public function clearHeaders()
    {
        $this->headers = [];

        return $this;
    }
}
