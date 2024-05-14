<?php

namespace Sylapi\Courier\Tests\Unit;

use PHPUnit\Framework\TestCase as PHPUnitTestCase;
use Sylapi\Courier\Contracts;
use Sylapi\Courier\Courier;

class CourierTest extends PHPUnitTestCase
{
    public function testCourier()
    {
        $createShipment = $this->createMock(Contracts\CourierCreateShipment::class);
        $postShipment = $this->createMock(Contracts\CourierPostShipment::class);
        $getLabels = $this->createMock(Contracts\CourierGetLabels::class);
        $getStatuses = $this->createMock(Contracts\CourierGetStatuses::class);
        $makeShipment = $this->createMock(Contracts\CourierMakeShipment::class);
        $makeParcel = $this->createMock(Contracts\CourierMakeParcel::class);
        $makeReceiver = $this->createMock(Contracts\CourierMakeReceiver::class);
        $makeSender = $this->createMock(Contracts\CourierMakeSender::class);
        $makeService = $this->createMock(Contracts\CourierMakeService::class);
        $makeOptions = $this->createMock(Contracts\CourierMakeOptions::class);
        $makeBooking = $this->createMock(Contracts\CourierMakeBooking::class);
        $makeLabelType = $this->createMock(Contracts\CourierMakeLabelType::class);

        $courier = new Courier(
            $createShipment,
            $postShipment,
            $getLabels,
            $getStatuses,
            $makeShipment,
            $makeParcel,
            $makeReceiver,
            $makeSender,
            $makeService,
            $makeOptions,
            $makeBooking,
            $makeLabelType,
        );

        $shipmentMock = $this->createMock(Contracts\Shipment::class);
        $bookingMock = $this->createMock(Contracts\Booking::class);
        $labelTypeMock = $this->createMock(Contracts\LabelType::class);

        $this->assertInstanceOf(Contracts\Response::class, $courier->createShipment($shipmentMock));
        $this->assertInstanceOf(Contracts\Response::class, $courier->postShipment($bookingMock));
        $this->assertInstanceOf(Contracts\Response::class, $courier->getLabel('111', $labelTypeMock));
        $this->assertInstanceOf(Contracts\Response::class, $courier->getStatus('111'));
        $this->assertInstanceOf(Contracts\Shipment::class, $courier->makeShipment());
        $this->assertInstanceOf(Contracts\Parcel::class, $courier->makeParcel());
        $this->assertInstanceOf(Contracts\Receiver::class, $courier->makeReceiver());
        $this->assertInstanceOf(Contracts\Sender::class, $courier->makeSender());
        $this->assertInstanceOf(Contracts\Service::class, $courier->makeService());
        $this->assertInstanceOf(Contracts\Options::class, $courier->makeOptions());
        $this->assertInstanceOf(Contracts\Booking::class, $courier->makeBooking());
        $this->assertInstanceOf(Contracts\LabelType::class, $courier->makeLabelType());
    }
}
