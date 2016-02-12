<?php

namespace Civix\CoreBundle\DataFixtures\ORM\States;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Civix\CoreBundle\Entity\State;

/**
 * Load state data
 *
 */
class LoadStateData implements FixtureInterface, OrderedFixtureInterface, ContainerAwareInterface
{
     /**
     * @var ContainerInterface
     */
    private $container;

    private $dataFile;

    public function __construct()
    {
        $this->dataFile = __DIR__.'/states.csv';
    }
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {
        $dataFileHandler = fopen($this->dataFile, 'r');

        while (($csvRow = fgetcsv($dataFileHandler)) !== false) {
            $state = new State();
            $state->setName($csvRow[0]);
            $state->setCode($csvRow[1]);

            $manager->persist($state);
        }

        fclose($dataFileHandler);
        $manager->flush();
    }

    public function getOrder()
    {
        return 1;
    }
}
