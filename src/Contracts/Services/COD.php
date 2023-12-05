<?php

declare(strict_types=1);

namespace Sylapi\Courier\Contracts;

use Sylapi\Courier\Contracts\Validatable;

interface COD extends Service, Validatable
{
    public function getAmount(): ?float;
    
    public function setAmount(float $amount): self;
}
