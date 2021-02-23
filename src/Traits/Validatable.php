<?php

declare(strict_types=1);

namespace Sylapi\Courier\Traits;

trait Validatable
{
    private $errors;

    public function getErrors(): array
    {
        return $this->errors ?? [];
    }

    abstract public function validate(): bool;
}
