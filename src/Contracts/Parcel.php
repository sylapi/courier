<?php
declare(strict_types=1);

namespace Sylapi\Courier\Contracts;

interface Parcel {
    public function validate(): bool;
}