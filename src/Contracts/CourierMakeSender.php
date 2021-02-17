<?php

declare(strict_types=1);

namespace Sylapi\Courier\Contracts;

interface CourierMakeSender
{
    public function makeSender(): Sender;
}
