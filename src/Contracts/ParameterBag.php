<?php

declare(strict_types=1);

namespace Sylapi\Courier\Contracts;

interface ParameterBag
{
    public static function from(array $parameters = []): self;

    public function has(string $key): bool;

    public function get(string $key, mixed $default = null): mixed;

    public function set(string $key, mixed $value): void;

    public function all(): array; 
    
    public function pushArray(array $parameters): self;
}
