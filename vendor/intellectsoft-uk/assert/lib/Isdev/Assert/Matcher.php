<?php

namespace Isdev\Assert;

class Matcher
{
    public static function matchPrimitives($expected, $actual)
    {
        if ($expected !== $actual && '*' !== $expected) {
            self::fail($expected, $actual);
        }
    }

    public static function matchArrays(array $expected, $actual)
    {
        if (!is_array($actual) || count($expected) !== count($actual)) {
            self::fail($expected, $actual, 'Array length does not match the expected.');
        }
        foreach ($expected as $k => $v) {
            if (!isset($actual[$k])) {
                self::fail($v , 'undefined', "Property \"$k\" is undefined");
            }
            if (is_array($v)) {
                self::matchArrays($v, $actual[$k]);
            } else {
                self::matchPrimitives($v, $actual[$k]);
            }
        }
    }

    private static function fail($expected, $actual, $message = '')
    {
        throw new Exception\AssertionException(sprintf('Failed asserting that "%s" match "%s". %s',
            json_encode($expected), json_encode($actual), $message));
    }
}
