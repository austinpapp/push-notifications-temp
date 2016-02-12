<?php

namespace Civix\FrontBundle\Controller\Representative;

use Civix\FrontBundle\Controller\PetitionController as Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * @Route("/petitions")
 */
class PetitionController extends Controller
{
    public function getPetitionClass()
    {
        return '\Civix\CoreBundle\Entity\Poll\Question\RepresentativePetition';
    }

    public function getPetitionFormClass()
    {
        return '\Civix\FrontBundle\Form\Type\Poll\Petition';
    }
}
