<?php

namespace Sylapi\Courier\Tests\Unit;

use PHPUnit\Framework\TestCase as PHPUnitTestCase;
use Sylapi\Courier\CourierFactory;
use Sylapi\Courier\Exceptions\InvalidArgumentException;

class CourierFactoryTest extends PHPUnitTestCase
{
    public function testCourierNameINotValid()
    {
        $this->expectException(InvalidArgumentException::class);
        $courierName = \sha1((string) time());
        CourierFactory::create($courierName,  []);
    }
}
