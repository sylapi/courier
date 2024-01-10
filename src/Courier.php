<?php

namespace Sylapi\Courier;

use Sylapi\Courier\Contracts\Parcel;
use Sylapi\Courier\Contracts\Sender;
use Sylapi\Courier\Contracts\Booking;
use Sylapi\Courier\Contracts\Options;
use Sylapi\Courier\Contracts\Service;
use Sylapi\Courier\Contracts\Receiver;
use Sylapi\Courier\Contracts\Shipment;
use Sylapi\Courier\Contracts\LabelType;
use Sylapi\Courier\Contracts\CourierGetLabels;
use Sylapi\Courier\Contracts\CourierMakeParcel;
use Sylapi\Courier\Contracts\CourierMakeSender;
use Sylapi\Courier\Contracts\CourierGetStatuses;
use Sylapi\Courier\Contracts\CourierMakeBooking;
use Sylapi\Courier\Contracts\CourierMakeOptions;
use Sylapi\Courier\Contracts\CourierMakeService;
use Sylapi\Courier\Contracts\CourierMakeReceiver;
use Sylapi\Courier\Contracts\CourierMakeShipment;
use Sylapi\Courier\Contracts\CourierPostShipment;
use Sylapi\Courier\Contracts\CourierMakeLabelType;
use Sylapi\Courier\Contracts\CourierCreateShipment;
use Sylapi\Courier\Contracts\Response as ResponseContract;

class Courier implements Contracts\Courier
{
    public function __construct(
        private CourierCreateShipment $createShipment,
        private CourierPostShipment $postShipment,
        private CourierGetLabels $getLabels,
        private CourierGetStatuses $getStatuses,
        private CourierMakeShipment $makeShipment,
        private CourierMakeParcel $makeParcel,
        private CourierMakeReceiver $makeReceiver,
        private CourierMakeSender $makeSender,
        private CourierMakeService $makeService,
        private CourierMakeOptions $makeOptions,
        private CourierMakeBooking $makeBooking,
        private CourierMakeLabelType $makeLabelType
    ) {
    }

    public function createShipment(Shipment $shipment): ResponseContract
    {
        return $this->createShipment->createShipment($shipment);
    }

    public function postShipment(Booking $booking): ResponseContract
    {
        return $this->postShipment->postShipment($booking);
    }

    public function getLabel(string $shipmentId, LabelType $labelType): ResponseContract
    {
        return $this->getLabels->getLabel($shipmentId, $labelType);
    }

    public function getStatus(string $shipmentId): ResponseContract
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

    public function makeService(?string $serviceType = null): Service
    {
        return $this->makeService->makeService($serviceType);
    }      

    public function makeOptions(): Options
    {
        return $this->makeOptions->makeOptions();
    }    

    public function makeBooking(): Booking
    {
        return $this->makeBooking->makeBooking();
    }

    public function makeLabelType(): LabelType
    {
        return $this->makeLabelType->makeLabelType();
    }
}
