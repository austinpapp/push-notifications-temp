<?php

namespace Civix\ApiBundle\Tests\DataFixtures\ORM\Group;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Civix\CoreBundle\Entity\Group\GroupField;

class LoadPublicFieldsData extends AbstractFixture implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $group = $this->getReference('public-group-fields');
        $field1 = new GroupField();
        $field1->setFieldName('field1');
        $field1->setGroup($group);
        $manager->persist($field1);
        
        $field2 = new GroupField();
        $field2->setFieldName('field2');
        $field2->setGroup($group);
        $manager->persist($field2);
        
        $group->addField($field1);
        $group->addField($field2);
        $group->updateFillFieldsRequired();
        $manager->persist($group);
        
        $manager->flush();

        $this->addReference('public-group-field-field1', $field1);
        $this->addReference('public-group-field-field2', $field2);
    }
}
