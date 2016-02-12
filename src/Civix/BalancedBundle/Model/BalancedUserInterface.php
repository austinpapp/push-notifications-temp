<?php

namespace Civix\BalancedBundle\Model;

interface BalancedUserInterface
{
    public function getId();
    public function getUsername();
    public function getEmail();
    public function getBalancedUri();
    public function setBalancedUri($uri);
}
