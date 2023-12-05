<?php

declare(strict_types=1);

namespace Sylapi\Courier\Contracts;

interface Service extends ParameterBag
{
    public function setRequest(array $request): self;

    public function getRequest(): ?array;

    public function handle(): array;

}
