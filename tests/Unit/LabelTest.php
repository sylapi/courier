<?php

namespace Sylapi\Courier\Tests\Unit;

use PHPUnit\Framework\TestCase as PHPUnitTestCase;
use Sylapi\Courier\Responses\Label as LabelResponse;

class LabelTest extends PHPUnitTestCase
{
    public function testLabelHasData()
    {
        $data = (string) \sha1('string');
        $label = new LabelResponse($data);
        $this->assertEquals((string) $label, $data);
    }

    public function testLabelHasEmptyData()
    {
        $label = new LabelResponse(null);
        $this->assertEquals((string) $label, '');
    }
}
