<?php

namespace Sylapi\Courier\Tests\Unit;

use PHPUnit\Framework\TestCase as PHPUnitTestCase;
use Sylapi\Courier\Responses\Status as StatusResponse;

class StatusTest extends PHPUnitTestCase
{
    public function testStatusHasData()
    {
        $data = (string) \sha1('string');
        $status = new StatusResponse($data);
        $this->assertEquals((string) $status, $data);
    }

    public function testStatusHasEmptyData()
    {
        $status = new StatusResponse(null);
        $this->assertEquals((string) $status, '');
    }
}
