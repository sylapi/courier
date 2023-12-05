<?php

namespace Sylapi\Courier\Services;

use Sylapi\Courier\Abstracts\Service;
use Sylapi\Courier\Traits\Validatable;
use Sylapi\Courier\Contracts\Services\COD as CODContract;


class COD extends Service implements CODContract
{
    use Validatable;

    public function getAmount(): ?float
    {
        return $this->get('amount', null);
    }

    public function setAmount(float $amount): self
    {
        $this->set('amount', $amount);
        return $this;
    }

    private function validate(): bool
    {
        return true;
    }
}
