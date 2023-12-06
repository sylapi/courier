<?php

declare(strict_types=1);

namespace Sylapi\Courier\Contracts;

use Sylapi\Courier\Contracts\LabelType;

interface CourierGetLabels
{
    public function getLabel(string $shipmentId, LabelType $labelType): Response;
}
