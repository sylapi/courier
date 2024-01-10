<?php

declare(strict_types=1);

namespace Sylapi\Courier\Abstracts;

use Sylapi\Courier\Contracts\Booking as BookingContract;
use Sylapi\Courier\Traits\Validatable;

abstract class Booking implements BookingContract
{
    use Validatable;

    private ?string $shipmentId;

    public function getShipmentId()
    {
        return $this->shipmentId;
    }

    public function setShipmentId(string $shipmentId): BookingContract
    {
        $this->shipmentId = $shipmentId;

        return $this;
    }
}
