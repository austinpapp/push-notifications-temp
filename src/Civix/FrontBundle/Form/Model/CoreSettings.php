<?php

namespace Civix\FrontBundle\Form\Model;

use Civix\CoreBundle\Service\Settings;
use Symfony\Component\Validator\Constraints as Assert;

class CoreSettings
{
    public static $fields = [
        Settings::POLL_EXPIRE_INTERVAL => [
            'integer',
            'Question expire interval (days)'
        ],
        Settings::MICROPETITION_EXPIRE_INTERVAL_0 => [
            'integer',
            'Micropetition expire interval for groups (days)'
        ],
        Settings::MICROPETITION_EXPIRE_INTERVAL_3 => [
            'integer',
            'Micropetition expire interval for towns (days)'
        ],
        Settings::MICROPETITION_EXPIRE_INTERVAL_2 => [
            'integer',
            'Micropetition expire interval for states (days)'
        ],
        Settings::MICROPETITION_EXPIRE_INTERVAL_1 => [
            'integer',
            'Micropetition expire interval for countries (days)'
        ],
        Settings::DEFAULT_EXPIRE_INTERVAL => [
            'integer',
            'Default expire interval (days)'
        ],
    ];

    /**
     * @var Settings
     */
    private $settings;

    /**
     * @Assert\NotBlank
     * @Assert\Range(min=1, max=30)
     */
    private $micropetition_expire_interval_0;

    /**
     * @Assert\NotBlank
     * @Assert\Range(min=1, max=30)
     */
    private $micropetition_expire_interval_1;

    /**
     * @Assert\NotBlank
     * @Assert\Range(min=1, max=30)
     */
    private $micropetition_expire_interval_2;

    /**
     * @Assert\NotBlank
     * @Assert\Range(min=1, max=30)
     */
    private $micropetition_expire_interval_3;

    function __construct(Settings $settings)
    {
        $this->settings = $settings;

        foreach (self::$fields as $key => $params) {
            $this->$key = $settings->get($key)->getValue();
        }
    }

    public function save()
    {
        foreach (self::$fields as $key => $params) {
            $this->settings->set($key, $this->$key);
        }

        $this->settings->save();
    }

    /**
     * @return mixed
     */
    public function getMicropetitionExpireInterval0()
    {
        return $this->micropetition_expire_interval_0;
    }

    /**
     * @param mixed $micropetition_expire_interval_0
     * @return $this
     */
    public function setMicropetitionExpireInterval0($micropetition_expire_interval_0)
    {
        $this->micropetition_expire_interval_0 = $micropetition_expire_interval_0;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getMicropetitionExpireInterval1()
    {
        return $this->micropetition_expire_interval_1;
    }

    /**
     * @param mixed $micropetition_expire_interval_1
     * @return $this
     */
    public function setMicropetitionExpireInterval1($micropetition_expire_interval_1)
    {
        $this->micropetition_expire_interval_1 = $micropetition_expire_interval_1;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getMicropetitionExpireInterval2()
    {
        return $this->micropetition_expire_interval_2;
    }

    /**
     * @param mixed $micropetition_expire_interval_2
     * @return $this
     */
    public function setMicropetitionExpireInterval2($micropetition_expire_interval_2)
    {
        $this->micropetition_expire_interval_2 = $micropetition_expire_interval_2;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getMicropetitionExpireInterval3()
    {
        return $this->micropetition_expire_interval_3;
    }

    /**
     * @param mixed $micropetition_expire_interval_3
     * @return $this
     */
    public function setMicropetitionExpireInterval3($micropetition_expire_interval_3)
    {
        $this->micropetition_expire_interval_3 = $micropetition_expire_interval_3;

        return $this;
    }
} 