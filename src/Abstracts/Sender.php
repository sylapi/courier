<?php
declare(strict_types=1);

namespace Sylapi\Courier\Abstracts;

use Sylapi\Courier\Contracts\Sender as SenderContract;

abstract class Sender extends Address implements SenderContract
{
    const TYPE = 'sender';
}