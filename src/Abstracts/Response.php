<?php

declare(strict_types=1);

namespace Sylapi\Courier\Abstracts;

use Sylapi\Courier\Contracts\Response as ResponseContract;

abstract class Response extends \stdClass implements ResponseContract
{
    private $errors = [];

    public function hasErrors(): bool
    {
        return is_array($this->errors) && count($this->errors) > 0;
    }

    public function addError(\Throwable $error): ResponseContract
    {
        $this->errors[] = $error;

        return $this;
    }

    public function getErrors()
    {
        return $this->errors;
    }

    public function getFirstError(): ?\Throwable
    {
        if (!$this->hasErrors()) {
            return null;
        }

        return current($this->errors);
    }
}
