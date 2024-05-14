<?php

declare(strict_types=1);

namespace Sylapi\Courier\Contracts;

interface CourierMakeParcel
{
    public function makeParcel(): Parcel;
}
