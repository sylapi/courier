<?php

declare(strict_types=1);

namespace Sylapi\Courier\Contracts;
interface Options
{
    public function __construct(array $options = []);

    public function has(string $key): bool;

    public function get(string $key);

    public function set(string $key, mixed $value): void;

    public function all(): array;    
}
