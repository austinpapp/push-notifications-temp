<?php
namespace Civix\CoreBundle\Entity;

interface CheckingLimits
{
     public function getQuestionLimit();

     public function setQuestionLimit($limit);
}
