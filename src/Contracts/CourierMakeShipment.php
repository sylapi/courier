<?php
declare(strict_types=1);

namespace Sylapi\Courier\Contracts;

use Sylapi\Courier\Contracts\Shipment;

interface CourierMakeShipment
{
	public function makeShipment(): Shipment;
}