<?php

namespace Civix\CoreBundle\Service;

use Civix\CoreBundle\Entity\Setting;
use Doctrine\ORM\EntityManager;

class Settings
{

    const MICROPETITION_EXPIRE_INTERVAL_0 = 'micropetition_expire_interval_0';
    const MICROPETITION_EXPIRE_INTERVAL_1 = 'micropetition_expire_interval_1';
    const MICROPETITION_EXPIRE_INTERVAL_2 = 'micropetition_expire_interval_2';
    const MICROPETITION_EXPIRE_INTERVAL_3 = 'micropetition_expire_interval_3';
    const POLL_EXPIRE_INTERVAL = 'poll_expire_interval';
    const DEFAULT_EXPIRE_INTERVAL = 'default_expire_interval';

    /**
     * @var EntityManager
     */
    private $em;

    /**
     * @var array
     */
    private $values = [];

    private $defaultValues = [
        self::MICROPETITION_EXPIRE_INTERVAL_0 => 1,
        self::MICROPETITION_EXPIRE_INTERVAL_1 => 1,
        self::MICROPETITION_EXPIRE_INTERVAL_2 => 1,
        self::MICROPETITION_EXPIRE_INTERVAL_3 => 1,
        self::POLL_EXPIRE_INTERVAL => 1,
        self::DEFAULT_EXPIRE_INTERVAL => 10,
    ];

    function __construct(EntityManager $em)
    {
        $this->em = $em;
        $this->load();
    }

    public function get($key)
    {
        return isset($this->values[$key]) ? $this->values[$key] : new Setting($key, $this->getDefault($key));
    }

    public function set($key, $value)
    {
        $this->values[$key] = $this->get($key)->setValue($value);

        return $this;
    }

    public function save()
    {
        foreach ($this->values as $entity) {
            $this->em->persist($entity);
            $this->em->flush($entity);
        }
    }

    private function load()
    {
        $entities = $this->em->getRepository(Setting::class)->findAll();
        $this->values = [];

        /* @var Setting $entity */
        foreach ($entities as $entity) {
            $this->values[$entity->getKey()] = $entity;
        }
    }

    private function getDefault($key)
    {
        return isset($this->defaultValues[$key]) ? $this->defaultValues[$key] : '';
    }
}