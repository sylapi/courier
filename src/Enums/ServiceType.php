<?php

declare(strict_types=1);

namespace Sylapi\Courier\Enums;


enum ServiceType: string {
    case COD = 'COD';
    case INSURANCE = 'Insurance';
    case PICKUP_POINT = 'PickupPoint';
}