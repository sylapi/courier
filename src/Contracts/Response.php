<?php

declare(strict_types=1);

namespace Sylapi\Courier\Contracts;

interface Response
{
    public function setRequest(mixed $request): Response;

    public function getRequest();

    public function setResponse(mixed $response): Response;

    public function getResponse();
}
