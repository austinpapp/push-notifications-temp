<?php

namespace Isdev\Assert;

class Assertion
{
    public static function jsonStringMatchJsonString($expected, $actual)
    {
        $expected = json_decode($expected, true);
        $actual = json_decode($actual, true);

        if (is_array($expected)) {
            Matcher::matchArrays($expected, $actual);
        } else {
            Matcher::matchPrimitives($expected, $actual);
        }
    }
}