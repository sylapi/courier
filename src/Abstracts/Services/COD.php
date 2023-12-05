<?php

namespace Sylapi\Courier\Abstracts\Services;

use Sylapi\Courier\Abstracts\Service;
use Sylapi\Courier\Traits\Validatable;
use Sylapi\Courier\Contracts\Services\COD as CODContract;

abstract class COD extends Service implements CODContract
{
    use Validatable;

    public function getAmount(): ?float
    {
        return $this->get('amount', null);
    }

    public function setAmount(float $amount): CODContract
    {
        $this->set('amount', $amount);
        return $this;
    }
}
