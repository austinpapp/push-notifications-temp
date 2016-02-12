<?php

namespace Civix\FrontBundle\Tests\DataFixtures\ORM\Group;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Civix\CoreBundle\Entity\Group\FieldValue;
use Civix\CoreBundle\Entity\UserGroup;

class LoadFieldValuesData extends AbstractFixture implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $field1 = $this->getReference('group-field1');
        $field2 = $this->getReference('group-field2');
        $user = $this->getReference('user-mobile1');
        $group = $this->getReference('group');
        
        $usergroup = new UserGroup($user, $group);
        $manager->persist($usergroup);
        
        $fieldValue1 = new FieldValue();
        $fieldValue1->setUser($user);
        $fieldValue1->setField($field1);
        $fieldValue1->setFieldValue('value1');
        
        $manager->persist($fieldValue1);
        
        $fieldValue2 = new FieldValue();
        $fieldValue2->setUser($user);
        $fieldValue2->setField($field2);
        $fieldValue2->setFieldValue('value2');
        
        $manager->persist($fieldValue2);
        $manager->flush();
    }
}
