<?php

namespace Sylapi\Courier;

use Sylapi\Courier\Contracts\Service as ServiceContract;
use Sylapi\Courier\Exceptions\ServiceNotAvailableException;

class ServiceFactory
{
    public static function create(string $courierName, string $serviceType): ServiceContract
    {
        self::validate($courierName, $serviceType);

        $classNameService = self::getClassName($courierName, $serviceType);
    
        return new $classNameService($courierName, $serviceType);
    }

    private static function validate(string $courierName, string $serviceType): void
    {
        $classNameService = self::getClassName($courierName, $serviceType);
        if (!class_exists($classNameService)
            || !class_exists($classNameService)
        ) {
            throw new ServiceNotAvailableException('Service '.$serviceType.' is not available for '.$courierName.'.');
        }
    }

    private static function getClassName(string $courierName, string $serviceType): string
    {
        return 'Sylapi\Courier\\'.$courierName.'\Services\\'.$serviceType;
    }
}
