<?php

namespace Sylapi\Courier\Abstracts;

use Sylapi\Courier\Contracts\LabelType as LabelTypeContract;
use Sylapi\Courier\Traits\Validatable;

abstract class LabelType implements LabelTypeContract
{
    use Validatable;

    private string $labelType;

    public function getLabelType(): string
    {
        return $this->labelType;
    }

    public function setLabelType(string $labelType): self
    {
        $this->labelType = $labelType;

        return $this;
    }
}