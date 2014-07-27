<?php
namespace CommonTest\Validator;

use Common\Validator\NotIdentical;

class ValidatorTest extends \PHPUnit_Framework_TestCase
{
    public function testIsValid()
    {
        $validator = new NotIdentical('foo');

        $this->assertTrue($validator->isValid('bar'));
        $this->assertFalse($validator->isValid('foo'));
    }
}
