<?php

namespace Sylapi\Courier\Abstracts;

use Sylapi\Courier\Contracts\ParameterBag as ParameterBagContract;

abstract class ParameterBag implements ParameterBagContract
{
    private $parameters;

    public function from(array $parameters = [])
    {
        $this->parameters = $parameters;
    }

    public function has(string $key): bool
    {
        return array_key_exists($key, $this->parameters);
    }

    public function get(string $key)
    {
        if ($this->has($key)) {
            return $this->parameters[$key];
        }

        return null;
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