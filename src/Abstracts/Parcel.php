<?php

declare(strict_types=1);

namespace Sylapi\Courier\Abstracts;

use Sylapi\Courier\Contracts\Parcel as ParcelContract;
use Sylapi\Courier\Traits\Validatable;

abstract class Parcel implements ParcelContract
{
    use Validatable;

    private $weight;
    private $width;
    private $height;
    private $length;

    public function getWeight(): ?float
    {
        return $this->weight;
    }

    public function setWeight(float $weight): ParcelContract
    {
        $this->weight = $weight;

        return $this;
    }

    public function getWidth(): ?int
    {
        return $this->width;
    }

    public function setWidth(int $width): ParcelContract
    {
        $this->width = $width;

        return $this;
    }

    public function getHeight(): ?int
    {
        return $this->height;
    }

    public function setHeight(int $height): ParcelContract
    {
        $this->height = $height;

        return $this;
    }

    public function getLength(): ?int
    {
        return $this->length;
    }

    public function setLength(int $length): ParcelContract
    {
        $this->length = $length;

        return $this;
    }
}
