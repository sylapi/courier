<?php

namespace Sylapi\Courier\Abstracts;

use Sylapi\Courier\Contracts\Service as ServiceContract;
use Sylapi\Courier\Traits\Validatable;

abstract class Service implements ServiceContract
{
    use Validatable;
}