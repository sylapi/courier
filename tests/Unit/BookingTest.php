<?php

namespace Sylapi\Courier\Tests\Unit;

use PHPUnit\Framework\TestCase as PHPUnitTestCase;
use Sylapi\Courier\Abstracts\Booking;

class BookingTest extends PHPUnitTestCase
{
    private function getBookingMock()
    {
        return $this->getMockForAbstractClass(
            Booking::class
        );
    }

    public function testBooking()
    {
        $booking = $this->getBookingMock();
        $shipmentId = (string) rand(1000, 9999);
        $booking->setShipmentId($shipmentId);

        $this->assertEquals($shipmentId, $booking->getShipmentId());
    }
}
