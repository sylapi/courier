<?php

declare(strict_types=1);

namespace Sylapi\Courier\Traits;

trait Validatable
{
    private $errors;

    public function setErrors(array $errors): self
    {
        $this->errors = $errors;

        return $this;
    }

    public function getErrors(): array
    {
        return $this->errors ?? [];
    }

    abstract public function validate(): bool;
}
