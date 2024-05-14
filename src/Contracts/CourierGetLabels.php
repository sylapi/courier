<?php

declare(strict_types=1);

namespace Sylapi\Courier\Contracts;

use Sylapi\Courier\Contracts\LabelType;
use Sylapi\Courier\Responses\Label;

interface CourierGetLabels
{
    public function getLabel(string $shipmentId, LabelType $labelType): Label;
}
