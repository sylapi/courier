<?php

declare(strict_types=1);

namespace Sylapi\Courier\Contracts;

use Sylapi\Courier\Contracts\Shipment;
use Sylapi\Courier\Responses\Shipment as ResponseShipment;

interface CourierCreateShipment
{
    public function createShipment(Shipment $shipment): ResponseShipment;
}
