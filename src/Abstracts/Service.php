<?php

namespace Sylapi\Courier\Abstracts;

use Sylapi\Courier\Contracts\Service as ServiceContract;
use Sylapi\Courier\Traits\Validatable;

abstract class Service extends ParameterBag implements ServiceContract
{
    use Validatable;

    private array $request = [];

    public function setRequest(array $request): self
    {
        $this->request = $request;
        return $this;
    }

    public function getRequest(): ?array
    {
        return $this->request;
    }

    public function validate(): bool
    {
        return true;
    }

    abstract public function handle(): array;
}