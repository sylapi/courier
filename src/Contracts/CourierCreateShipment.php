<?php

declare(strict_types=1);

namespace Sylapi\Courier\Contracts;
use Sylapi\Courier\Contracts\Response as ResponseContract;

interface CourierCreateShipment
{
    public function createShipment(Shipment $shipment): ResponseContract;
}
