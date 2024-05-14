<?php

namespace Sylapi\Courier\Abstracts;

use Sylapi\Courier\Contracts\ParameterBag as ParameterBagContract;

abstract class ParameterBag implements ParameterBagContract
{
    private $parameters = [];

    public static function from(array $parameters = []): self
    {
        /* @phpstan-ignore-next-line */
        $self = new static();
        $self->parameters = $parameters;
        return $self;
    }

    public function has(string $key): bool
    {
        return array_key_exists($key, $this->parameters);
    }

    public function get(string $key, mixed $default = null): mixed
    {
        if ($this->has($key)) {
            return $this->parameters[$key];
        }

        return $default;
    }

    public function set(string $key, $value): void
    {
        $this->parameters[$key] = $value;
    }

    public function all(): array
    {
        return $this->parameters;
    }    
}