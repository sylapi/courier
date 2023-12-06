<?php

declare(strict_types=1);

namespace Sylapi\Courier\Contracts;

interface CourierGetStatuses
{
    public function getStatus(string $shipmentId): Response;
}
