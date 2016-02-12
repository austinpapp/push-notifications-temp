<?php

namespace Civix\CoreBundle\Entity;

use Symfony\Component\Security\Core\User\UserInterface as SymfonyUserInterface;

interface UserInterface extends SymfonyUserInterface
{
    public function getId();

    public function getEmail();

    public function getType();

    public function getOfficialName();
}