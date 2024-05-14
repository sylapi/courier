<?php

declare(strict_types=1);

namespace Sylapi\Courier\Contracts;

interface CourierMakeOptions
{
    public function makeOptions(): Options;
}
