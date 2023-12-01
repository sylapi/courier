<?php

declare(strict_types=1);

namespace Sylapi\Courier\Contracts;

interface LabelType extends Validatable
{
    public function getLabelType(): string;

    public function setLabelType(string $labelType): self;
}
