<?php

namespace Sylapi\Courier\Abstracts\Services;

use Sylapi\Courier\Abstracts\Service;
use Sylapi\Courier\Traits\Validatable;
use Sylapi\Courier\Contracts\Services\PickupPoint as PickupPointContract;

abstract class PickupPoint extends Service implements PickupPointContract
{
    use Validatable;

    public function getPickupId(): ?string
    {
        return $this->get('pickupId', null);
    }

    public function setPickupId(string $pickupId): PickupPointContract
    {
        $this->set('pickupId', $pickupId);
        return $this;
    }
}
