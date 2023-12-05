<?php

namespace Sylapi\Courier\Abstracts\Services;

use Sylapi\Courier\Abstracts\Service;
use Sylapi\Courier\Traits\Validatable;
use Sylapi\Courier\Contracts\Services\COD as CODContract;

abstract class PickupPoint extends Service implements CODContract
{
    use Validatable;

    public function getPickupId(): ?float
    {
        return $this->get('pickupId', null);
    }

    public function setPickupId(string $pickupId): CODContract
    {
        $this->set('pickupId', $pickupId);
        return $this;
    }
}
