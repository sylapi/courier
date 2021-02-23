<?php

declare(strict_types=1);

namespace Sylapi\Courier\Contracts;

interface Validatable
{
    public function getErrors(): array;
    public function validate(): bool;
}
