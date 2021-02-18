<?php

namespace Sylapi\Courier\Tests\Unit;

use Sylapi\Courier\CourierFactory;
use Sylapi\Courier\Exceptions\InvalidArgumentException;
use PHPUnit\Framework\TestCase as PHPUnitTestCase;

class CourierFactoryTest extends PHPUnitTestCase
{
    public function testCourierNameINotValid()
    {
        $this->expectException(InvalidArgumentException::class);
        $courierName = \sha1((string) time());
        CourierFactory::create($courierName, []);
    }
}
