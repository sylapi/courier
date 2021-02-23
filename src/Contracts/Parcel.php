<?php

declare(strict_types=1);

namespace Sylapi\Courier\Contracts;

interface Parcel extends Validatable
{
    public function getWeight(): ?float;

    public function setWeight(float $weight): self;

    public function getWidth(): ?int;

    public function setWidth(int $width): self;

    public function getHeight(): ?int;

    public function setHeight(int $height): self;

    public function getLength(): ?int;

    public function setLength(int $length): self;
}
