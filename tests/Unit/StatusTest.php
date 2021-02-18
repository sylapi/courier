<?php

namespace Sylapi\Courier\Tests\Unit;

use Sylapi\Courier\Entities\Status;
use PHPUnit\Framework\TestCase as PHPUnitTestCase;

class StatusTest extends PHPUnitTestCase
{
    public function testStatusHasData()
    {
        $data = (string) \sha1('string');
        $status = new Status($data);
        $this->assertEquals((string) $status, $data);
    }

    public function testStatusHasEmptyData()
    {
        $status = new Status(null);
        $this->assertEquals((string) $status, '');
    }
}
