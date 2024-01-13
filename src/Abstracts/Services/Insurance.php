<?php

namespace Sylapi\Courier\Abstracts\Services;

use Sylapi\Courier\Abstracts\Service;
use Sylapi\Courier\Traits\Validatable;
use Sylapi\Courier\Contracts\Services\Insurance as InsuranceContract;

abstract class Insurance extends Service implements InsuranceContract
{
    use Validatable;

    public function getAmount(): ?float
    {
        return $this->get('amount', null);
    }

    public function setAmount(float $amount): InsuranceContract
    {
        $this->set('amount', $amount);
        return $this;
    }
}
