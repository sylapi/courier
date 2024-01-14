<?php

declare(strict_types=1);

namespace Sylapi\Courier\Contracts;

use Sylapi\Courier\Responses\Status;

interface CourierGetStatuses
{
    public function getStatus(string $shipmentId): Status;
}
