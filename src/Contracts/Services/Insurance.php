<?php

declare(strict_types=1);

namespace Sylapi\Courier\Contracts\Services;

use Sylapi\Courier\Contracts\Validatable;
use Sylapi\Courier\Contracts\Service;

interface Insurance extends Service, Validatable
{
    public function getAmount(): ?float;
    
    public function setAmount(float $amount): self;
}
