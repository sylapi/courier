<?php

declare(strict_types=1);

namespace Sylapi\Courier\Contracts;

interface CourierMakeCredentials
{
    public function makeCredentials(): Credentials;
}
