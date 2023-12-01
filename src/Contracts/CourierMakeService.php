<?php

declare(strict_types=1);

namespace Sylapi\Courier\Contracts;

use Sylapi\Courier\Contracts\Service;

interface CourierMakeService
{
    public function makeService(): Service;
}
