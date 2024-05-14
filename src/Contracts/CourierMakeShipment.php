<?php

declare(strict_types=1);

namespace Sylapi\Courier\Contracts;

interface CourierMakeShipment
{
    public function makeShipment(): Shipment;
}
