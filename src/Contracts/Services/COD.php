<?php

namespace Sylapi\Courier\Contracts\Services;

use Sylapi\Courier\Abstracts\Service;
use Sylapi\Courier\Traits\Validatable;

class COD extends Service
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
