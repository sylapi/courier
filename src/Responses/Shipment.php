<?php

declare(strict_types=1);

namespace Sylapi\Courier\Responses;

use Sylapi\Courier\Abstracts\Response as ResponseAbstract;
use Sylapi\Courier\Contracts\Booking;
use Sylapi\Courier\Contracts\Response as ResponseContract;

class Shipment extends ResponseAbstract implements ResponseContract
{
    private ?string $shipmentId;
    private ?Booking $booking;

    public function setShipmentId(string $ShipmentId): Shipment
    {
        $this->shipmentId = $ShipmentId;

        return $this;
    }

    public function getShipmentId(): ?string
    {
        return $this->shipmentId;
    }

    public function setBooking(Booking $booking): Shipment
    {
        $this->booking = $booking;

        return $this;
    }

    public function getBooking(): ?Booking
    {
        return $this->booking;
    }
}
