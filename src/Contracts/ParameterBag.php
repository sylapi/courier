<?php

declare(strict_types=1);

namespace Sylapi\Courier\Contracts;

interface ParameterBag
{
    public function get($key, $default = null);

    public function set($key, $value);

    public function has($key);

    public function all();

    public function remove($key);

    public function clear();
}