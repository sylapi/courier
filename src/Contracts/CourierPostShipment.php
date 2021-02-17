<?php
declare(strict_types=1);

namespace Sylapi\Courier\Contracts;

interface CourierPostShipment
{
	public function postShipment(Booking $booking) : array;
}