<?php
declare(strict_types=1);

namespace Sylapi\Courier\Contracts;

use Sylapi\Courier\Contracts\Parcel;

interface CourierMakeParcel
{
	public function makeParcel(): Parcel;
}