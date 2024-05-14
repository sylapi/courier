<?php

declare(strict_types=1);

namespace Sylapi\Courier\Abstracts;

use Sylapi\Courier\Contracts\Response as ResponseContract;

abstract class Response implements ResponseContract
{
    private mixed $request;
    private mixed $response;

    public function setRequest( mixed $request): ResponseContract
    {
        $this->request = $request;

        return $this;
    }

    public function getRequest()
    {
        return $this->request;
    }

    public function setResponse(mixed $response): ResponseContract
    {
        $this->response = $response;

        return $this;
    }

    public function getResponse()
    {
        return $this->response;
    }
}
