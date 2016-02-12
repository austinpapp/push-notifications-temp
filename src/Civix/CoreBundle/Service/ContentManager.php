<?php

namespace Civix\CoreBundle\Service;

use Doctrine\ORM\EntityManager;

use Civix\CoreBundle\Parser\Tags;
use Civix\CoreBundle\Parser\UrlConverter;
use Civix\CoreBundle\Entity\BaseComment;
use Civix\CoreBundle\Entity\User;

class ContentManager
{
    private $em;
    private $userRepo;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
        $this->userRepo = $em->getRepository(User::class);
    }

    public function handleCommentContent(BaseComment $comment)
    {
        $content = $this->escape($comment->getCommentBody());

        $replacements = []; $users = [];
        $mentions = Tags::parseMentionTags($content);

        foreach ($mentions as $username) {
            $tag = '@' . $username;
            if (!isset($replacements[$tag])) {
                $user = $this->userRepo->findOneByUsername($username);
                if ($user) {
                    $users[$username] = $user;
                    $replacements[$tag] = "<a data-user-id=\"{$user->getId()}\">$tag</a>";
                }
            }
        }

        $content = UrlConverter::wrapLinks($content);
        $content = Tags::replaceMentionTags($content, $replacements);
        $content = Tags::wrapHashTags($content);

        $comment->setCommentBodyHtml($content);

        return $users;
    }

    private function escape($content)
    {
        return strtr($content, ['<' => '&lt;', '>' => '&gt;']);
    }
}