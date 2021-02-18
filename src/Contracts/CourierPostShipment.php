<?php

declare(strict_types=1);

namespace Sylapi\Courier\Contracts;

use Sylapi\Courier\Contracts\Response as ResponseContract;

interface CourierPostShipment
{
    public function postShipment(Booking $booking): ResponseContract;
}
