<?php

declare(strict_types=1);

namespace Sylapi\Courier\Responses;

use Sylapi\Courier\Abstracts\Response as ResponseAbstract;
use Sylapi\Courier\Contracts\Response as ResponseContract;

class Label extends ResponseAbstract implements ResponseContract
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
