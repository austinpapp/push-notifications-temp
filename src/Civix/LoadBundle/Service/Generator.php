<?php

namespace Civix\LoadBundle\Service;

class Generator
{
    private $dbConnection;

    public function __construct($connection)
    {
        $this->dbConnection = $connection->getConnection();
    }
    
    public function generateUsers($scenarioConfig)
    {
        $userQuery = 'INSERT INTO user (id, username, password, salt, firstName, '.
            'lastName, email, zip, avatar, birth, address1, address2, city, state, country, token) '.
            'VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
        
        for ($userCounter = 1; $userCounter <= $scenarioConfig['users']; $userCounter++) {
            $username = 'user'.$userCounter;
            $this->dbConnection->executeUpdate($userQuery, array(
                $userCounter,
                $username,
                sha1($username),
                sha1($username),
                $username,
                $username,
                $username.'@test.com',
                10020,
                null,
                '1980-10-01',
                '363 Yundt Mills',
                null,
                'New York',
                'NY',
                'US',
                sha1($username)
            ));
        }
    }

    public function generateFollowers($scenarioConfig)
    {
        $followQuery = 'INSERT INTO users_follow (date_create, date_approval, status, '.
            'user_id, follower_id) VALUES (?, ?, ?, ?, ?)';

        for ($userId = 1; $userId <= $scenarioConfig['users']; $userId++) {
            for ($followerCnt = 1; $followerCnt <= $scenarioConfig['followers']; $followerCnt++) {
                $followerId = $scenarioConfig['users'] - $userId - $followerCnt;
                if ($followerId > 0 && $userId !== $followerId) {
                    $this->dbConnection->executeUpdate($followQuery, array(
                        '2012-01-01',
                        '2012-01-01',
                        1,
                        $userId,
                        $followerId
                    ));
                }
            }
        }
    }

    public function generateDistricts($scenarioConfig)
    {
        $districtQuery = 'INSERT INTO districts (id, label, district_type) VALUES (?, ?, ?)';

        $type = 1;
        for ($districtCounter = 1; $districtCounter <= $scenarioConfig['districts']; $districtCounter++) {
            $type++;
            if ($type > 8) {
                $type = 1;
            }
            $this->dbConnection->executeUpdate($districtQuery, array(
                $districtCounter,
                'District' . $districtCounter,
                $type
            ));
        }
    }

    public function generateUserdistrict($scenarioConfig)
    {
        $districtUserQuery = 'INSERT INTO users_districts (user_id, district_id) VALUES (?, ?)';

        for ($userCounter = 1; $userCounter <= $scenarioConfig['users']; $userCounter++) {
            for ($districtCounter = 1; $districtCounter <= $scenarioConfig['userdistricts']; $districtCounter++) {
                $this->dbConnection->executeUpdate($districtUserQuery, array(
                    $userCounter,
                    $districtCounter
                ));
            }
        }
    }

    public function generateStrepresentatives($scenarioConfig)
    {
        $representativeQuery = 'INSERT INTO representatives_storage (storage_id, firstName, lastName, '.
            'officialTitle, avatar_src, district_id) VALUES (?, ?, ?, ?, ?, ?)';

        $districtId = 1;
        for ($reprCount = 1; $reprCount <= $scenarioConfig['st_representative']; $reprCount++) {
            $districtId++;
            if ($districtId > $scenarioConfig['districts']) {
                $districtId = 1;
            }
            $this->dbConnection->executeUpdate($representativeQuery, array(
                    $reprCount,
                    'FirstName',
                    'LastName',
                    'Representative',
                    'http://google.com',
                    $districtId
                ));
        }
    }

    public function generateRepresentatives($scenarioConfig)
    {
        $representativeQuery = 'INSERT INTO representatives (id, firstname, lastname, username, password,'.
            'officialTitle, country, city, officialAddress, officialPhone, status, email, storage_id'.
            ', state, district_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';

        $districtId = 1;
        for ($reprCount = 1; $reprCount <=  $scenarioConfig['representative']; $reprCount++) {
            $districtId++;
            if ($districtId > $scenarioConfig['districts']) {
                $districtId = 1;
            }
            $this->dbConnection->executeUpdate($representativeQuery, array(
                $reprCount,
                'FirstName',
                'LastName',
                'representative'.$reprCount,
                sha1('Representative'),
               'Representative',
                'US',
                'New York',
                '123 New St',
                '222222222',
                1,
                'repr'.$reprCount.'@test.com',
                $reprCount,
                'NY',
                $districtId
            ));
        }
    }

    public function generateGroups($scenarioConfig)
    {
        $groupsQuery = 'INSERT INTO groups (id, username, password, manager_email, official_name)'.
            ' VALUES (?, ?, ?, ?, ?)';

        for ($groupCount = 1; $groupCount <= $scenarioConfig['groups']; $groupCount++) {
            $groupName = 'group'.$groupCount;
            $this->dbConnection->executeUpdate($groupsQuery, array(
                $groupCount,
                $groupName,
                sha1($groupName),
                $groupName.'@test.com',
                $groupName
            ));
        }
    }

    public function generateUsergroups($scenarioConfig)
    {
        $groupsQuery = 'INSERT INTO users_groups (user_id, group_id, status, created_at) VALUES (?, ?, 1, NOW())';

        for ($userId = 1; $userId <= $scenarioConfig['users']; $userId++) {
            for ($groupId = $userId; $groupId <= $scenarioConfig['groups']; $groupId = $groupId + 3) {
                $this->dbConnection->executeUpdate($groupsQuery, [$userId, $groupId]);
            }
        }
    }

    public function generateQuestions($scenarioConfig)
    {
        $questionRepQuery = 'INSERT INTO poll_questions (id, subject, published_at, representative_id, type)'.
            ' VALUES (?, ?, ?, ?, ?)';
        $questionGrQuery = 'INSERT INTO poll_questions (id, subject, published_at, group_id, type)'.
            ' VALUES (?, ?, ?, ?, ?)';
        $optionQuery = 'INSERT INTO poll_options (value, question_id) VALUES (?, ?)';

        $representativeId = 1;
        for ($questionCount = 1; $questionCount <= $scenarioConfig['questions']; $questionCount++) {
            $representativeId++;
            if ($representativeId > $scenarioConfig['representative']) {
                $representativeId = 1;
            }
            //add questions
            $this->dbConnection->executeUpdate($questionRepQuery, [
                $questionCount,
                'Question',
                '2013-09-01',
                $representativeId,
                'representative'
            ]);
            $this->dbConnection->executeUpdate($questionGrQuery, [
                $questionCount + $scenarioConfig['questions'],
                'Question',
                '2013-09-01',
                $representativeId,
                'group'
            ]);

            //add options
            $this->dbConnection->executeUpdate($optionQuery, [
                'option',
                $questionCount
            ]);
            $this->dbConnection->executeUpdate($optionQuery, [
                'option',
                $questionCount + $scenarioConfig['questions']
            ]);
        }
    }

    public function generatePetitions($scenarioConfig)
    {
        $petitionRepQuery = 'INSERT INTO poll_questions (id, petition_title, petition_body, published_at, representative_id, type)'.
            ' VALUES (?, ?, ?, ?, ?, ?)';
        $petitionGrQuery = 'INSERT INTO poll_questions (id, petition_title, petition_body, published_at, group_id, type)'.
            ' VALUES (?, ?, ?, ?, ?, ?)';
        $optionQuery = 'INSERT INTO poll_options (value, question_id) VALUES (?, ?)';
        
        $petitionStartId = $scenarioConfig['questions']*2;
        $representativeId = 1;
        for ($questionCount = 1; $questionCount <= $scenarioConfig['petitions']; $questionCount++) {
            $representativeId++;
            if ($representativeId > $scenarioConfig['representative']) {
                $representativeId = 1;
            }

            //add petitions
            $this->dbConnection->executeUpdate($petitionRepQuery, [
                $petitionStartId + $questionCount,
                'Petition',
                'Lorem Ipsum is simply dummy text of the printing and typesetting industry',
                '2013-09-01',
                $representativeId,
                'representative_petition'
            ]);
            $this->dbConnection->executeUpdate($petitionGrQuery, [
                $petitionStartId + $questionCount + $scenarioConfig['petitions'],
                'Petition',
                'Lorem Ipsum is simply dummy text of the printing and typesetting industry',
                '2013-09-01',
                $representativeId,
                'group_petition'
            ]);

            //add options
            $this->dbConnection->executeUpdate($optionQuery, [
                'sign',
                $petitionStartId + $questionCount
            ]);
        }
    }
    
    public function generateComments($scenarioConfig)
    {
        $commentQuery = 'INSERT INTO comments (id, pid, comment_body, created_at, '.
            'user_id, question_id, petition_id, rate_sum, rates_count, privacy, type) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
        
        $commentsId = 1;
        
        for ($questionCount = 1; $questionCount <= $scenarioConfig['questions']; $questionCount++) {
            for ($commentsCount = 0; $commentsCount < $scenarioConfig['comments']; $commentsCount++) {
                $pid = rand(0, ($commentsId -1));
                $this->dbConnection->executeUpdate($commentQuery, [
                    $commentsId++,
                    $pid>0?$pid:null,
                   'Laboriosam dolorem dolores eos non voluptatum tempore.',
                    '2013-09-01',
                    rand(1, $scenarioConfig['users']),
                    $questionCount,
                    null,
                    rand(1, 10),
                    rand(1, 1000),
                    rand(0,1),
                    'poll'
                ]);
            }
        }
        
        $micropetitionCommentId = $commentsId;
        
        for ($questionCount = 1; $questionCount <= $scenarioConfig['micropetitions']; $questionCount++) {
            for ($commentsCount = 0; $commentsCount < $scenarioConfig['comments']; $commentsCount++) {
                $pid = rand($micropetitionCommentId, ($commentsId -1));
                $this->dbConnection->executeUpdate($commentQuery, [
                    $commentsId++,
                    $pid>$micropetitionCommentId?$pid:null,
                   'Laboriosam dolorem dolores eos non voluptatum tempore.',
                    '2013-09-01',
                    rand(1, $scenarioConfig['users']),
                    null,
                    $questionCount,
                    rand(1, 10),
                    rand(1, 1000),
                    rand(0,1),
                    'micropetition'
                ]);
            }
        }
    }

    public function generateMicropetitions($scenarioConfig)
    {
        $petitionQuery = 'INSERT INTO micropetitions (id, title, petition, group_id, created_at, expire_at, '.
            'user_expire_interval, publish_status, user_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)';
        
        for ($petitionCount = 1; $petitionCount <= $scenarioConfig['micropetitions']; $petitionCount++) {
            $this->dbConnection->executeUpdate($petitionQuery, array(
                $petitionCount,
                'Aut velit doloribus ad repellendus possimus voluptatem tenetur.',
                'Aut velit doloribus ad repellendus possimus voluptatem tenetur.',
                rand(1, $scenarioConfig['groups']),
                (new \DateTime())->format('Y-m-d'),
                (new \DateTime('tomorrow'))->format('Y-m-d'),
                5,
                1,
                rand(1, $scenarioConfig['users'])
            ));
        }
    }

    public function generateSocialActivities($scenarioConfig)
    {
        $query = 'INSERT INTO social_activities (group_id, recipient_id, following_id, `type`, created_at, target)' .
            ' VALUES (?, ?, ?, ?, ?, ?)';
        $createdAt = (new \DateTime())->format('Y-m-d');
        for ($userId = 1; $userId < $scenarioConfig['users']; $userId++) {
            for ($key = 0; $key < $scenarioConfig['socialActivities']; $key++) {
                if ($key < ($scenarioConfig['socialActivities'] / 2)) {
                    $this->dbConnection->executeUpdate($query, [
                        rand(1, $scenarioConfig['groups']),
                        $userId,
                        null,
                        'joinToGroup-approved',
                        $createdAt,
                        serialize([]),
                    ]);
                } else {
                    $this->dbConnection->executeUpdate($query, [
                        rand(1, $scenarioConfig['groups']),
                        null,
                        $userId,
                        'joinToGroup-approved',
                        $createdAt,
                        serialize([]),
                    ]);
                }
            }
        }

    }
}
