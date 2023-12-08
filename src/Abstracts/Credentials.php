<?php

namespace Sylapi\Courier\Abstracts;

use Sylapi\Courier\Contracts\Credentials as CredentialsContract;
use Sylapi\Courier\Contracts\ParameterBag as ParameterBagContract;
use Sylapi\Courier\Abstracts\ParameterBag;
abstract class Credentials extends ParameterBag implements CredentialsContract, ParameterBagContract
{
    private string $login;
    private string $password;
    private bool $sandbox;
    private string $apiUrl;

    public function setLogin(string $login): self
    {
        $this->login = $login;

        return $this;
    }

    public function getLogin(): string
    {
        return $this->login;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setSandbox(bool $sandbox): self
    {
        $this->sandbox = $sandbox;

        return $this;
    }

    public function getSandbox(): bool
    {
        return $this->sandbox;
    }    

    public function isSandbox(): bool
    {
        return $this->getSandbox();
    }

    public function setApiUrl(string $apiUrl): self
    {
        $this->apiUrl = $apiUrl;

        return $this;
    }

    public function getApiUrl(): string
    {
        return $this->apiUrl;
    }
}