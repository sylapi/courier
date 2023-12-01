<?php

namespace Sylapi\Courier\Abstracts;

use Sylapi\Courier\Contracts\LabelType as LabelTypeContract;

abstract class LabelType implements LabelTypeContract
{
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