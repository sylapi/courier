<?php

declare(strict_types=1);

namespace Sylapi\Courier\Responses;

use Sylapi\Courier\Abstracts\Response as ResponseAbstract;
use Sylapi\Courier\Contracts\Response as ResponseContract;

class Status extends ResponseAbstract implements ResponseContract
{
    public function __construct(
        private ?string $statusName = null, 
        private ?string $originalStatusName = null)
    {

    }

    public function getStatusName(): ?string
    {
        return $this->statusName;
    }

    public function setStatusName(?string $statusName): self
    {
        $this->statusName = $statusName;

        return $this;
    }

    public function getOriginalStatusName(): ?string
    {
        return $this->originalStatusName;
    }

    public function setOriginalStatusName(?string $originalStatusName): self
    {
        $this->originalStatusName = $originalStatusName;

        return $this;
    }

    public function __toString(): string
    {
        return $this->statusName ?? '';
    }
}
