<?php

declare(strict_types=1);

namespace Sylapi\Courier\Contracts;

interface CourierGetLabels
{
    public function getLabel(string $shipmentId): ?string;
}
