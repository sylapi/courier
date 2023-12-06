<?php

declare(strict_types=1);

namespace Sylapi\Courier\Entities;

use Sylapi\Courier\Abstracts\Response as ResponseAbstract;
use Sylapi\Courier\Contracts\Response as ResponseContract;

class Status extends ResponseAbstract implements ResponseContract
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
