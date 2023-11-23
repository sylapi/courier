<?php

namespace Sylapi\Courier\Abstracts;
use Sylapi\Courier\Contracts\ParameterBag as ContractsParameterBag;
class ParameterBag implements ContractsParameterBag {
    private $parameters = [];

    public function __construct(array $parameters = []) {
        $this->parameters = $parameters;
    }

    public function get($key, $default = null) {
        return $this->parameters[$key] ?? $default;
    }

    public function set($key, $value) {
        $this->parameters[$key] = $value;
    }

    public function has($key) {
        return isset($this->parameters[$key]);
    }

    public function all() {
        return $this->parameters;
    }

    public function remove($key) {
        unset($this->parameters[$key]);
    }

    public function clear() {
        $this->parameters = [];
    }
}