<?php
declare(strict_types=1);

namespace Sylapi\Courier\Contracts;


interface CourierCreateShipment
{
	public function createShipment(Shipment $shipment) : array;
}