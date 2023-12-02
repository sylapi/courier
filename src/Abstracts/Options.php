<?php

namespace Sylapi\Courier\Abstracts;

use Sylapi\Courier\Contracts\Options as OptionsContract;
use Sylapi\Courier\Traits\Validatable;

abstract class Options implements OptionsContract
{
    use Validatable;

    private $options;

    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function has(string $key): bool
    {
        return array_key_exists($key, $this->options);
    }

    public function get(string $key)
    {
        if ($this->has($key)) {
            return $this->options[$key];
        }

        return null;
    }

    public function set(string $key, $value): void
    {
        $this->options[$key] = $value;
    }

    public function all(): array
    {
        return $this->options;
    }    
}