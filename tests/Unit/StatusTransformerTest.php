<?php

namespace Sylapi\Courier\Tests\Unit;

use PHPUnit\Framework\TestCase as PHPUnitTestCase;
use Sylapi\Courier\Abstracts\StatusTransformer;

class StatusTransformerTest extends PHPUnitTestCase
{
    private function getStatusTransformerMock(array $parameters)
    {
        return $this->getMockForAbstractClass(
            StatusTransformer::class,
            $parameters
        );
    }

    public function testStatusTransformer()
    {
        $status = 'TEST1';
        $statusTransformer = $this->getStatusTransformerMock([$status]);
        $this->assertEquals($status, (string) $statusTransformer);
    }

    // public function testStatusTransformerWithNameChange()
    // {
    //     $status = 'TEST1';
    //     $statusTransform = 'TEST2';

    //     $statusTransformer = $this->getStatusTransformerMock([ $status ]);
    //     $statusTransform->setStatuses([ $status => $statusTransform ]);

    //     $this->assertEquals($statusTransform, (string) $statusTransformer);
    // }
}
