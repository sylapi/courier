<?php

namespace Sylapi\Courier\Tests\Unit;

use Sylapi\Courier\Entities\Label;
use PHPUnit\Framework\TestCase as PHPUnitTestCase;

class LabelTest extends PHPUnitTestCase
{
    public function testLabelHasData()
    {
        $data = (string) \sha1('string');
        $label = new Label($data);
        $this->assertEquals((string) $label, $data);
    }

    public function testLabelHasEmptyData()
    {
        $label = new Label(null);
        $this->assertEquals((string) $label, '');
    }
}
