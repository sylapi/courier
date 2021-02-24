<?php
declare(strict_types=1);

namespace Sylapi\Courier\Helpers;

use Sylapi\Courier\Contracts\Response;

class ResponseHelper
{
    public static function pushErrorsToResponse(Response &$response, array $errors): Response
    {
        foreach($errors as $error) {
            if($error instanceof \Throwable) {
                $response->addError($error);
            }
        }

        return $response;
    }
}
