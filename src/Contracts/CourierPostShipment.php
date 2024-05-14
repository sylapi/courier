<?php

declare(strict_types=1);

namespace Sylapi\Courier\Contracts;

use Sylapi\Courier\Responses\Parcel;

interface CourierPostShipment
{
    public function postShipment(Booking $booking): Parcel;
}
