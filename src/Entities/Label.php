<?php

declare(strict_types=1);

namespace Sylapi\Courier\Entities;

use Sylapi\Courier\Abstracts\Response;
use Sylapi\Courier\Contracts\Label as LabelContract;

class Label extends Response implements LabelContract
{
    private $data;

    public function __construct(?string $data)
    {
        $this->data = $data;
    }

    public function __toString(): string
    {
        return $this->data ?? '';
    }
}
