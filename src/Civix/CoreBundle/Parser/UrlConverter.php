<?php

namespace Civix\CoreBundle\Parser;

class UrlConverter
{

    public static function convert($text)
    {
        $originalParts = preg_split("/\s+/", $text);
        $resultParts = array();
        foreach ($originalParts as $part) {
            $resultParts[] = self::isURL($part) ? self::createLink($part) : htmlspecialchars($part);
        }

        return implode(' ', $resultParts);
    }

    public static function isURL($text)
    {
        $regExp = '/((([A-Za-z]{3,9}:(?:\/\/)?)(?:[-;:&=\+\$,\w]+@)?[A-Za-z0-9.-]+|'
            . '(?:www.|[-;:&=\+\$,\w]+@)[A-Za-z0-9.-]+)((?:\/[\+~%\/.\w-_]*)?\??(?:[-\+=&;%@.\w_]*)#?(?:[\w]*))?)/';

        return (bool) preg_match($regExp, $text);
    }

    public static function createLink($url)
    {
        $last = '';
        if (preg_match('/[.,!?]$/', $url)) {
            $length = mb_strlen($url);
            $last = $url[$length - 1];
            $url = mb_substr($url, 0, $length - 1);
        }

        $originalUlr = $url;
        if (mb_strlen($originalUlr) > 20) {
            $originalUlr = mb_substr($originalUlr, 0, 20) . '...';
        }
        if (!preg_match('/^https?:\/\//', $url)) {
            $url = 'http://' . $url;
        }

        return '<a href="' . htmlspecialchars($url, ENT_QUOTES) . '">' .
            htmlspecialchars($originalUlr) . '</a>' . $last;
    }

    public static function wrapLinks($text)
    {
        $pattern = '/(?<=\s|^)(http:\/\/|https:\/\/)?(www\.)?[a-zA-Z0-9\-]{3,12}\.[a-zA-Z]{2,3}(\/\S*)?(?=[\s.,!?:;]|$)/';
        return preg_replace_callback($pattern, function($matches) {
            return '<a href="' . htmlspecialchars($matches[0], ENT_QUOTES) .
                '" target="_blank">' . htmlspecialchars($matches[0]) . '</a>';
        }, $text);
    }
}
