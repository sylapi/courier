<?php
declare(strict_types=1);

namespace Sylapi\Courier\Contracts;

use Sylapi\Courier\Contracts\Sender;

interface CourierMakeSender
{
	public function makeSender(): Sender;
}