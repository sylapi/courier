<?php

namespace Sylapi\Courier\Abstracts;

use Sylapi\Courier\Contracts\Credentials as CredentialsContract;
use Sylapi\Courier\Contracts\ParameterBag as ParameterBagContract;
use Sylapi\Courier\Abstracts\ParameterBag;
abstract class Credentials extends ParameterBag implements CredentialsContract, ParameterBagContract
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
        $this->set('password',$password);

        return $this;
    }

    public function getPassword(): string
    {
        return $this->get('password');
    }

    public function setSandbox(bool $sandbox): self
    {
        $this->set('sandbox',$sandbox);

        return $this;
    }

    public function getSandbox(): bool
    {
        return $this->get('sandbox', false);
    }    

    public function isSandbox(): bool
    {
        return $this->getSandbox();
    }

    public function setApiUrl(string $apiUrl): self
    {
        $this->set('apiUrl', $apiUrl);

        return $this;
    }

    public function getApiUrl(): string
    {
        return $this->get('apiUrl');
    }
}