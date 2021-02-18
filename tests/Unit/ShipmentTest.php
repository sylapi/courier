<?php

namespace Sylapi\Courier\Tests\Unit;

use PHPUnit\Framework\TestCase as PHPUnitTestCase;
use Sylapi\Courier\Abstracts\Parcel;
use Sylapi\Courier\Abstracts\Receiver;
use Sylapi\Courier\Abstracts\Sender;
use Sylapi\Courier\Abstracts\Shipment;
use Sylapi\Courier\Contracts\Parcel as ParcelContract;
use Sylapi\Courier\Contracts\Receiver as ReceiverContract;
use Sylapi\Courier\Contracts\Sender as SenderContract;

class ShipmentTest extends PHPUnitTestCase
{
    private $shipmentArray = [
        'referenceId' => 'XYZ',
        'externalId'  => 'ABC',
        'content'     => 'Test...',
    ];

    private function getShipmentMock()
    {
        return $this->getMockForAbstractClass(
            Shipment::class
        );
    }

    private function getParcelMock()
    {
        return $this->getMockForAbstractClass(
            Parcel::class
        );
    }

    private function getSenderMock()
    {
        return $this->getMockForAbstractClass(
            Sender::class
        );
    }

    private function getReceiverMock()
    {
        return $this->getMockForAbstractClass(
            Receiver::class
        );
    }

    public function testShipment()
    {
        $weight = 11.5;

        $parcel = $this->getParcelMock();
        $parcel->setWeight($weight);

        $sender = $this->getSenderMock();
        $receiver = $this->getReceiverMock();

        $shipment = $this->getShipmentMock();
        $shipmentArray = $this->shipmentArray;
        $shipment->setReferenceId($shipmentArray['referenceId'])
            ->setExternalId($shipmentArray['externalId'])
            ->setContent($shipmentArray['content'])
            ->setParcel($parcel)
            ->setReceiver($receiver)
            ->setSender($sender);

        $this->assertEquals($shipmentArray['referenceId'], $shipment->getReferenceId());
        $this->assertEquals($shipmentArray['externalId'], $shipment->getExternalId());
        $this->assertEquals($shipmentArray['content'], $shipment->getContent());
        $this->assertEquals(1, $shipment->getQuantity());
        $this->assertEquals($weight, $shipment->getWeight());
        $this->assertInstanceOf(ReceiverContract::class, $shipment->getReceiver());
        $this->assertInstanceOf(SenderContract::class, $shipment->getSender());
        $this->assertInstanceOf(ParcelContract::class, $shipment->getParcel());
    }
}
