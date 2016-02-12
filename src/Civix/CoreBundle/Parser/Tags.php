<?php

namespace Civix\CoreBundle\Parser;


class Tags
{
    /**
     * @param string $text
     * @return array
     */
    public static function parseHashTags($text)
    {
        $result = array();
        preg_match_all('/(\s|^)(#[\w-]+)/', $text, $matches);

        foreach ($matches[2] as $item) {
            $hash = mb_strtolower($item);
            if (!in_array($hash, $result)) {
                $result[] = $hash;
            }
        }

        return array(
            'parsed' => $result,
            'original' => $matches[2]
        );
    }

    public static function parseMentionTags($text)
    {
        preg_match_all('/@([a-zA-Z0-9._-]+[a-zA-Z0-9])/', $text, $matches);
        return $matches[1];
    }

    public static function replaceMentionTags($text, $replacements)
    {
        return preg_replace_callback(
            '/(?<!>)(@([a-zA-Z0-9._-]+[a-zA-Z0-9]))/',
            function($matches) use ($replacements) {
                return isset($replacements[$matches[1]]) ? $replacements[$matches[1]] : $matches[1];
            },
            $text
        );
    }

    public static function wrapHashTags($text)
    {
        return preg_replace('/(\s|^)(#[\w-]+)/', '$1<a data-hashtag="$2">$2</a>', $text);
    }
}
