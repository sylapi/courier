<?php

namespace Sylapi\Courier;

use Sylapi\Courier\Contracts\Booking;
use Sylapi\Courier\Contracts\CourierCreateShipment;
use Sylapi\Courier\Contracts\CourierGetLabels;
use Sylapi\Courier\Contracts\CourierGetStatuses;
use Sylapi\Courier\Contracts\CourierMakeBooking;
use Sylapi\Courier\Contracts\CourierMakeParcel;
use Sylapi\Courier\Contracts\CourierMakeReceiver;
use Sylapi\Courier\Contracts\CourierMakeSender;
use Sylapi\Courier\Contracts\CourierMakeShipment;
use Sylapi\Courier\Contracts\CourierPostShipment;
use Sylapi\Courier\Contracts\Parcel;
use Sylapi\Courier\Contracts\Receiver;
use Sylapi\Courier\Contracts\Sender;
use Sylapi\Courier\Contracts\Shipment;

class Courier implements Contracts\Courier
{
    private $createShipment;
    private $postShipment;
    private $getLabels;
    private $getStatuses;
    private $makeShipment;
    private $makeParcel;
    private $makeReceiver;
    private $makeSender;
    private $makeBooking;

    public function __construct(
        CourierCreateShipment $createShipment,
        CourierPostShipment $postShipment,
        CourierGetLabels $getLabels,
        CourierGetStatuses $getStatuses,
        CourierMakeShipment $makeShipment,
        CourierMakeParcel $makeParcel,
        CourierMakeReceiver $makeReceiver,
        CourierMakeSender $makeSender,
        CourierMakeBooking $makeBooking
    ) {
        $this->createShipment = $createShipment;
        $this->postShipment = $postShipment;
        $this->getLabels = $getLabels;
        $this->getStatuses = $getStatuses;
        $this->makeShipment = $makeShipment;
        $this->makeParcel = $makeParcel;
        $this->makeReceiver = $makeReceiver;
        $this->makeSender = $makeSender;
        $this->makeBooking = $makeBooking;
    }

    public function createShipment(Shipment $shipment): array
    {
        return $this->createShipment->createShipment($shipment);
    }

    public function postShipment(Booking $booking): array
    {
        return $this->postShipment->postShipment($booking);
    }

    public function getLabel(string $shipmentId): ?string
    {
        return $this->getLabels->getLabel($shipmentId);
    }

    public function getStatus(string $shipmentId): string
    {
        return $this->getStatuses->getStatus($shipmentId);
    }

    public function makeShipment(): Shipment
    {
        return $this->makeShipment->makeShipment();
    }

    public function makeParcel(): Parcel
    {
        return $this->makeParcel->makeParcel();
    }

    public function makeReceiver(): Receiver
    {
        return $this->makeReceiver->makeReceiver();
    }

    public function makeSender(): Sender
    {
        return $this->makeSender->makeSender();
    }

    public function makeBooking(): Booking
    {
        return $this->makeBooking->makeBooking();
    }
}
