<?php

declare(strict_types=1);

namespace Sylapi\Courier\Helpers;

class ReferenceHelper
{
    const length = 32;

    public static function generate()
    {
        return substr(\sha1((string) time()), 0, self::length);
    }
}
