<?php

namespace Isdev\Assert\Tests;

use Isdev\Assert\Assertion;

class AssertionTest extends \PHPUnit_Framework_TestCase
{
    public function testJsonStringMatchJsonString()
    {
        Assertion::jsonStringMatchJsonString('null', 'null');
        Assertion::jsonStringMatchJsonString('"foo"', '"foo"');
        Assertion::jsonStringMatchJsonString('{"id":2}', '{"id": 2}');
        Assertion::jsonStringMatchJsonString('{"id":2, "user": {"name": "Bob"}}', '{"id":2, "user": {"name": "Bob"}}');
        Assertion::jsonStringMatchJsonString('{"id":2, "user": "*"}', '{"id":2, "user": {"name": "Bob"}}');
        Assertion::jsonStringMatchJsonString('{"id":2, "user": {"name": "*"}}', '{"id":2, "user": {"name": "Bob"}}');
        Assertion::jsonStringMatchJsonString('[{"id":2, "user": {"name": "*"}}]', '[{"id":2, "user": {"name": "Bob"}}]');
        Assertion::jsonStringMatchJsonString('{"foo":{"foo": {"foo": 1}}}', '{"foo":{"foo": {"foo": 1}}}');
        Assertion::jsonStringMatchJsonString('{"title": "test", "id":2}', '{"id":2, "title": "test"}');
        Assertion::jsonStringMatchJsonString('{"id":"*"}', '{"id": 2}');
        Assertion::jsonStringMatchJsonString('[{"id":2}, {"id":3}]', '[{"id":2}, {"id":3}]');
    }

    /**
     * @expectedException \Isdev\Assert\Exception\AssertionException
     */
    public function testJsonStringMatchJsonStringFailUndefinedProperty()
    {
        Assertion::jsonStringMatchJsonString('{"id":"*"}', '{}');
    }

    /**
     * @expectedException \Isdev\Assert\Exception\AssertionException
     */
    public function testJsonStringMatchJsonStringFailInvalidProperty()
    {
        Assertion::jsonStringMatchJsonString('{"id":2, "user": {"name": "Tom"}}', '{"id":2, "user": {"name": "Bob"}}');
    }

    /**
     * @expectedException \Isdev\Assert\Exception\AssertionException
     */
    public function testJsonStringMatchJsonStringFailUnexpectedProperty()
    {
        Assertion::jsonStringMatchJsonString('{"id":2}', '{"id":2, "user": {"name": "Bob"}}');
    }

    /**
     * @expectedException \Isdev\Assert\Exception\AssertionException
     */
    public function testJsonStringMatchJsonStringFailIncorrectArrayLength()
    {
        Assertion::jsonStringMatchJsonString('[{"id":2}]', '[{"id":2}, {"id":3}]');
    }
}