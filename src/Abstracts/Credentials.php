<?php

namespace Sylapi\Courier\Abstracts;

use Sylapi\Courier\Contracts\Credentials as ContractsCredentials;
use Sylapi\Courier\Contracts\ParameterBag as ContractsParameterBag;

abstract class Credentials extends ParameterBag implements ContractsCredentials, ContractsParameterBag
{
    public function setLogin(string $login): self
    {
        $this->set('login', $login);

        return $this;
    }

    public function getLogin(): string
    {
        return $this->get('login');
    }

    public function setPassword(string $password): self
    {
        $this->set('password', $password);

        return $this;
    }

    public function getPassword(): string
    {
        return $this->get('password');
    }

}