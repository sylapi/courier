<?php

declare(strict_types=1);

namespace Sylapi\Courier\Contracts;

interface Response
{
    public function hasErrors(): bool;

    public function addError(\Throwable $error): self;

    public function getFirstError(): ?\Throwable;
}
