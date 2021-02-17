<?php
declare(strict_types=1);

namespace Sylapi\Courier\Contracts;

use Sylapi\Courier\Contracts\Receiver;

interface CourierMakeReceiver
{
	public function makeReceiver(): Receiver;
}