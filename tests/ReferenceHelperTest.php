<?php
namespace Sylapi\Courier\Tests;

use PHPUnit\Framework\TestCase as PHPUnitTestCase;
use Sylapi\Courier\Helpers\ReferenceHelper;

class ReferenceHelperTest extends PHPUnitTestCase
{

    public function testReferenceGenerate()
    {
        $reference = ReferenceHelper::generate();
        $this->assertEquals(ReferenceHelper::LENGTH, strlen($reference));
    }
}