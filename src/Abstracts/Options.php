<?php

namespace Sylapi\Courier\Abstracts;

use Sylapi\Courier\Contracts\Options as OptionsContract;
use Sylapi\Courier\Traits\Validatable;

abstract class Options extends ParameterBag implements OptionsContract
{
    use Validatable;
}