<?php
declare(strict_types=1);

namespace Sylapi\Courier\Abstracts;
use Sylapi\Courier\Contracts\Receiver as ReceiverContract;

abstract class Receiver extends Address implements ReceiverContract
{
    const TYPE = 'receiver';
}