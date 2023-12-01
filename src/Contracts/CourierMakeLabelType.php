<?php

declare(strict_types=1);

namespace Sylapi\Courier\Contracts;

interface CourierMakeLabelType
{
    public function makeLabelType(): LabelType;
}
