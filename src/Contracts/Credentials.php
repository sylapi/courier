<?php

declare(strict_types=1);

namespace Sylapi\Courier\Contracts;

use Sylapi\Courier\Contracts\Response as ResponseContract;

interface Credentials
{
    public function setLogin(string $login): self;

    public function getLogin(): string;

    public function setPassword(string $password): self;

    public function getPassword(): string;
}