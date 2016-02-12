<?php

namespace Civix\ApiBundle\Features\Context;

use Behat\Behat\Context\BehatContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Doctrine\ORM\EntityManager;
use Civix\CoreBundle\Entity\Group;
use Civix\CoreBundle\Entity\User;
use Civix\CoreBundle\Entity\UserGroup;
use Civix\CoreBundle\Entity\Micropetitions\Petition;

class GroupContext extends BehatContext
{
    /**
     * @Given /^A group "([^"]*)" with data:$/
     */
    public function aGroupWithData($username, TableNode $table)
    {
        /* @var $em EntityManager */
        $em = $this->getMainContext()->getEntityManager();

        $group = $em->getRepository(Group::class)
            ->findOneByUsername($username);

        $hash = $table->getHash();
        foreach ($hash as $row) {
            if ('RequiredPermissions' === $row['property']) {
                $row['value'] = explode(',', $row['value']);
            }
            $method = 'set' . $row['property'];
            $group->{$method}($row['value']);
        }
        $em->flush($group);
    }

    /**
     * @Given /^I call GET \/api\/groups\/info\/:id, where :id is id of group "([^"]*)"$/
     */
    public function iCallGetApiGroupsInfoIdWhereIdIsIdOfGroup($username)
    {
         /* @var $em EntityManager */
        $em = $this->getMainContext()->getEntityManager();

        $group = $em->getRepository(Group::class)->findOneByUsername($username);
        $this->getMainContext()->callGetQuery('/api/groups/info/'.$group->getId());
    }

    /**
     * @Given /^I call GET \/api\/groups\/:id\/permissions, where :id is id of group "([^"]*)"$/
     */
    public function iCallGetApiGroupsIdPermissionsWhereIdIsIdOfGroup($username)
    {
         /* @var $em EntityManager */
        $em = $this->getMainContext()->getEntityManager();

        $group = $em->getRepository(Group::class)->findOneByUsername($username);
        $this->getMainContext()->callGetQuery('/api/groups/'.$group->getId().'/permissions');
    }

    /**
     *  @Given /^I call POST \/api\/groups\/:id\/permissions, where :id is id of group "([^"]*)" with data:$/
     */
    public function iCallPostApiGroupsIdPermissionsWhereIdIsIdOfGroupWithData($username, PyStringNode $string)
    {
         /* @var $em EntityManager */
        $em = $this->getMainContext()->getEntityManager();

        $group = $em->getRepository(Group::class)
            ->findOneByUsername($username);

        $this->getMainContext()->callWithData('/api/groups/'.$group->getId().'/permissions', $string);
    }
    
    /**
     * @Given /^There are micropetitions:$/
     */
    public function thereAreMicropetitions(TableNode $table)
    {
        /* @var $em EntityManager */
        $em = $this->getMainContext()->getEntityManager();

        $hash = $table->getHash();
        foreach ($hash as $row) {
            $group = $em->getRepository(Group::class)
                ->findOneByUsername($row['group']);

            $this->getMainContext()->getSubcontext('secure')->loggedInAsMobileUser($row['user']);
            $this->getMainContext()->callWithData('/api/micro-petitions', new PyStringNode(json_encode([
                'group_id' => $group->getId(),
                'user_expire_interval' => 7,
                'type' => $row['type'],
                'petition_body' => $row['body'],
                'title' => $row['title']
            ])));
        }
    }

    /**
     * @Given /^A group with username "([^"]*)" and password "([^"]*)"$/
     */
    public function aGroupWithUsernameAndPassword($username, $password)
    {
        /* @var $em EntityManager */
        $em = $this->getMainContext()->getEntityManager();

        $group = new Group();
        $group->setUsername($username)
            ->setPassword($password)
            ->setGroupType(Group::GROUP_TYPE_COMMON)
        ;
        $encoder = $this->getMainContext()->getContainer()->get('security.encoder_factory')->getEncoder($group);
        $encodedPassword = $encoder->encodePassword($password, $group->getSalt());
        $group->setPassword($encodedPassword);

        $em->persist($group);
        $em->flush($group);
    }

    /**
     * @Given /^user "([^"]*)" joined to group "([^"]*)"$/
     */
    public function userJoinedToGroup($username, $groupName)
    {
        /* @var $em EntityManager */
        $em = $this->getMainContext()->getEntityManager();

        /* @var $user User */
        $user = $em->getRepository(User::class)->findOneByUsername($username);
        /* @var $group Group */
        $group = $em->getRepository(Group::class)->findOneByUsername($groupName);
        $userGroup = new UserGroup($user, $group);
        $userGroup->setStatus(UserGroup::STATUS_ACTIVE);
        $em->persist($userGroup);
        $em->flush($userGroup);
    }

    /**
     * @Given /^There are "([^"]*)" community in the system$/
     */
    public function thereAreCommunityInTheSystem($groupName)
    {
        /* @var $em EntityManager */
        $em = $this->getMainContext()->getEntityManager();
        $group = new Group();
        $group
            ->setUsername($groupName)
            ->setPassword($groupName)
            ->setOfficialName($groupName)
            ->setManagerEmail($groupName)
        ;
        $em->persist($group);
        $em->flush($group);
    }

    /**
     * @Given /^The membership control for "([^"]*)" community is "([^"]*)"$/
     */
    public function theMembershipControlForCommunityIs($groupName, $membershipControl)
    {
        /* @var $em EntityManager */
        $em = $this->getMainContext()->getEntityManager();
        /* @var $group Group */
        $group = $em->getRepository(Group::class)->findOneByUsername($groupName);
        $group->setMembershipControl($membershipControl);
        $em->flush($group);
    }

    /**
     * @Then /^"([^"]*)" community approve the request from user "([^"]*)"$/
     */
    public function communityApproveTheRequestFromUser($groupName, $username)
    {
        /* @var $em EntityManager */
        $em = $this->getMainContext()->getEntityManager();
        /* @var $user User */
        $user = $em->getRepository(User::class)->findOneByUsername($username);
        /* @var $group Group */
        $group = $em->getRepository(Group::class)->findOneByUsername($groupName);
        $userGroup = $em->getRepository('CivixCoreBundle:UserGroup')->isJoinedUser($group, $user);
        $userGroup->setStatus($userGroup::STATUS_ACTIVE);
        $em->flush($userGroup);
        $this->getMainContext()->getContainer()->get('civix_core.social_activity_manager')
            ->noticeGroupJoiningApproved($userGroup);
    }
}
