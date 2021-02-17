<?php
declare(strict_types=1);

namespace Sylapi\Courier\Contracts;

use Sylapi\Courier\Contracts\Booking;

interface CourierMakeBooking
{
	public function makeBooking(): Booking;
}