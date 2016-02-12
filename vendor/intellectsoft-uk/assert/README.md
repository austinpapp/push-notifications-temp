Assert
======

Assertions:

    * Assertion::jsonStringMatchJsonString($expected, $actual)

Example usages
==============

```php
<?php
Assertion::jsonStringMatchJsonString('{"id":*, "user": {"name": "Bob"}}', '{"id":2, "user": {"name": "Bob"}}'); //success
Assertion::jsonStringMatchJsonString('{"user": {"name": "Bob"}}', '{"id":2, "user": {"name": "Bob"}}'); //fail
Assertion::jsonStringMatchJsonString('{"id":*, "user": {"name": "Bob"}}', '{"id":2, "user": {"name": "Tom"}}'); //fail
```