<?php

declare(strict_types=1);

namespace Sylapi\Courier\Contracts;

interface CourierMakeReceiver
{
    public function makeReceiver(): Receiver;
}
