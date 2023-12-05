<?php

declare(strict_types=1);

namespace Sylapi\Courier\Contracts\Services;

use Sylapi\Courier\Contracts\Validatable;
use Sylapi\Courier\Contracts\Service;

interface PickupPoint extends Service, Validatable
{
    public function getPickupId(): ?string;
    
    public function setPickupId(string $getPickupId): self;
}
