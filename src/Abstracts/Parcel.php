<?php

declare(strict_types=1);

namespace Sylapi\Courier\Abstracts;

use Sylapi\Courier\Contracts\Parcel as ParcelContract;

abstract class Parcel implements ParcelContract
{
    private $weight;
    private $width;
    private $height;
    private $length;

    public function getWeight()
    {
        return $this->weight;
    }

    public function setWeight($weight): ParcelContract
    {
        $this->weight = $weight;

        return $this;
    }

    public function getWidth()
    {
        return $this->width;
    }

    public function setWidth($width): ParcelContract
    {
        $this->width = $width;

        return $this;
    }

    public function getHeight()
    {
        return $this->height;
    }

    public function setHeight($height): ParcelContract
    {
        $this->height = $height;

        return $this;
    }

    public function getLength()
    {
        return $this->length;
    }

    public function setLength($length): ParcelContract
    {
        $this->length = $length;

        return $this;
    }
}
