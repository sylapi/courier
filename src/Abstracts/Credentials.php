<?php

namespace Sylapi\Courier\Abstracts;

use Sylapi\Courier\Contracts\Credentials as CredentialsContract;

abstract class Credentials implements CredentialsContract
{
    private string $login;
    private string $password;
    private bool $sandbox;

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
}