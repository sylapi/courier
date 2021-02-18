<?php

declare(strict_types=1);

namespace Sylapi\Courier\Entities;

use Sylapi\Courier\Abstracts\Response;
use Sylapi\Courier\Contracts\Status as StatusContract;

class Status extends Response implements StatusContract
{
    private $statusName;

    public function __construct(?string $statusName)
    {
        $this->statusName = $statusName;
    }

    public function __toString(): string
    {
        return $this->statusName ?? '';
    }
}
