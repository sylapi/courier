<?php

namespace Sylapi\Courier\Tests\Unit;

use Exception;
use PHPUnit\Framework\TestCase as PHPUnitTestCase;
use Sylapi\Courier\Abstracts\Response;

class ResponseTest extends PHPUnitTestCase
{
    private function getExceptionMock(array $arguments)
    {
        return $this->getMockForAbstractClass(
            Exception::class,
            $arguments
        );
    }

    private function getResponseMock()
    {
        return $this->getMockForAbstractClass(
            Response::class
        );
    }

    public function testHasErrors()
    {
        $response = $this->getResponseMock();
        $exception = $this->getExceptionMock(['']);
        $response->addError($exception);
        $this->assertTrue($response->hasErrors());
        $this->assertCount(1, $response->getErrors());
    }

    public function testNotHasErrors()
    {
        $response = $this->getResponseMock();
        $this->assertFalse($response->hasErrors());
        $this->assertNull($response->getFirstError());
    }

    public function testHasFirstError()
    {
        $response = $this->getResponseMock();
        $firstMessage = 'First error';
        $exception = $this->getExceptionMock([$firstMessage]);
        $response->addError($exception);
        $nextMessage = 'Next error';
        $exception = $this->getExceptionMock([$nextMessage]);
        $this->assertTrue($response->hasErrors());
        $this->assertEquals($firstMessage, $response->getFirstError()->getMessage());
    }
}
