<?php

namespace Civix\CoreBundle\Converters;

use Civix\CoreBundle\Entity\SocialActivity;
use Civix\CoreBundle\Entity\Micropetitions\Petition as Micropetition;

class SocialActivityConverter
{
    private static $Converters = [
        SocialActivity::TYPE_FOLLOW_REQUEST => 'getFollowRequest',
        SocialActivity::TYPE_JOIN_TO_GROUP_APPROVED => 'getJoinToGroupApproved',
        SocialActivity::TYPE_GROUP_POST_CREATED => 'getMicropetitionCreated',
        SocialActivity::TYPE_ANSWERED => 'getAnswered',
        SocialActivity::TYPE_FOLLOW_POLL_COMMENTED => 'getFollowPollCommented',
        SocialActivity::TYPE_FOLLOW_MICROPETITION_COMMENTED => 'getFollowMicropetitionCommented',
        SocialActivity::TYPE_COMMENT_REPLIED => 'getCommentReplied',
        SocialActivity::TYPE_GROUP_PERMISSIONS_CHANGED => 'getGroupPermissionsChanged',
        SocialActivity::TYPE_COMMENT_MENTIONED => 'getCommentMentioned',
    ];

    public static function toHTML(SocialActivity $entity)
    {
        if (isset(self::$Converters[$entity->getType()])) {
            $method = self::$Converters[$entity->getType()] . 'HTML';
            return self::$method($entity);
        }
    }

    public static function toText(SocialActivity $entity)
    {
        if (isset(self::$Converters[$entity->getType()])) {
            $method = self::$Converters[$entity->getType()] . 'Text';
            return self::$method($entity);
        }
    }

    private static function getFollowRequestHTML(SocialActivity $entity)
    {
        return '<p><strong>' . htmlspecialchars($entity->getFollowing()->getFullName()) . '</strong> wants to follow you</p>';
    }

    private static function getFollowRequestText(SocialActivity $entity)
    {
        return $entity->getFollowing()->getFullName() . ' wants to follow you';
    }

    private static function getJoinToGroupApprovedHTML(SocialActivity $entity)
    {
        return '<p>Request to join <strong>' . htmlspecialchars($entity->getGroup()->getOfficialName())
            . '</strong> has been approved</p>';
    }

    private static function getJoinToGroupApprovedText(SocialActivity $entity)
    {
        return 'Request to join ' . $entity->getGroup()->getOfficialName() . ' has been approved';
    }

    private static function getMicropetitionCreatedHTML(SocialActivity $entity)
    {
        if ($entity->getTarget()['type'] === Micropetition::TYPE_QUORUM) {
            return '<p><strong>' . htmlspecialchars($entity->getFollowing()->getFullName())
                . '</strong> posted in the <strong>'
                . htmlspecialchars($entity->getGroup()->getOfficialName()) . '</strong> community</p>';
        }
        if ($entity->getTarget()['type'] === Micropetition::TYPE_LONG_PETITION) {
            return '<p><strong>' . htmlspecialchars($entity->getFollowing()->getFullName())
                . '</strong> created a petition in the <strong>'
                . htmlspecialchars($entity->getGroup()->getOfficialName()) . '</strong> community</p>';
        }
    }

    private static function getMicropetitionCreatedText(SocialActivity $entity)
    {
        if ($entity->getTarget()['type'] === Micropetition::TYPE_QUORUM) {
            return $entity->getFollowing()->getFullName() . ' posted: '.mb_substr($entity->getTarget()['body'], 0, 50);
        }
        if ($entity->getTarget()['type'] === Micropetition::TYPE_LONG_PETITION) {
            return $entity->getFollowing()->getFullName() . ' posted: ' . $entity->getTarget()['title'];
        }
    }

    private static function getAnsweredHTML(SocialActivity $entity)
    {
        return '<p><strong>' . htmlspecialchars($entity->getFollowing()->getFullName()) . '</strong> responded to a '
            . $entity->getTarget()['label'] . ' "' . htmlspecialchars($entity->getTarget()['preview'])
            . '" in the <strong>' . htmlspecialchars($entity->getGroup()->getOfficialName())
            . '</strong> community</p>';
    }

    private static function getAnsweredText(SocialActivity $entity)
    {
        return $entity->getFollowing()->getFullName() . ' responded to a '
            . $entity->getTarget()['label'] . ' "' . $entity->getTarget()['preview']
            . '" in the ' . $entity->getGroup()->getOfficialName() . ' community';
    }

    private static function getFollowPollCommentedHTML(SocialActivity $entity)
    {
        return '<p><strong>' . htmlspecialchars($entity->getFollowing()->getFullName()) . '</strong> commented on '
            . $entity->getTarget()['label'] . ' in the <strong>'
            . htmlspecialchars($entity->getGroup()->getOfficialName()) . '</strong> community</p>';
    }

    private static function getFollowPollCommentedText(SocialActivity $entity)
    {
        return $entity->getFollowing()->getFullName() . ' commented on '
            . $entity->getTarget()['label'] . ' in the ' . $entity->getGroup()->getOfficialName() . ' community';
    }

    private static function getFollowMicropetitionCommentedHTML(SocialActivity $entity)
    {
        return '<p><strong>' . htmlspecialchars($entity->getFollowing()->getFullName()) . '</strong> commented on '
            . $entity->getTarget()['label'] . ' in the <strong>'
            . htmlspecialchars($entity->getGroup()->getOfficialName()) . '</strong> community</p>';
    }

    private static function getFollowMicropetitionCommentedText(SocialActivity $entity)
    {
        return $entity->getFollowing()->getFullName() . ' commented on ' . $entity->getTarget()['label']
            . ' in the <strong>' . $entity->getGroup()->getOfficialName() . ' community';
    }


    private static function getCommentRepliedHTML(SocialActivity $entity)
    {
        return '<p><strong>' . htmlspecialchars($entity->getFollowing()->getFullName())
            . '</strong> replied to your comment</p>';
    }

    private static function getCommentRepliedText(SocialActivity $entity)
    {
        return $entity->getFollowing()->getFullName() . ' replied to your comment';
    }

    private static function getGroupPermissionsChangedHTML(SocialActivity $entity)
    {
        return '<p>Permissions changed for <strong>' . htmlspecialchars($entity->getGroup()->getOfficialName())
            . '</strong></p>';
    }

    private static function getGroupPermissionsChangedText(SocialActivity $entity)
    {
        return 'Be advised: Permissions changed for ' . $entity->getGroup()->getOfficialName();
    }

    private static function getCommentMentionedText(SocialActivity $entity)
    {
        return $entity->getTarget()['first_name'] . ' mentioned you in a comment';
    }

    private static function getCommentMentionedHTML(SocialActivity $entity)
    {
        return '<p><strong>'. htmlspecialchars($entity->getTarget()['first_name'])
            . '</strong> mentioned you in a comment</p>';
    }
}