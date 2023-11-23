<?php

namespace Sylapi\Courier;

use Sylapi\Courier\Exceptions\InvalidArgumentException;
use Sylapi\Courier\Contracts\Credentials;
use Sylapi\Courier\Contracts\ParameterBag;

class CourierFactory
{
    public static function create(string $courierName, Credentials $credentials, ParameterBag $options)
    {
        self::validateCourierName($courierName);

        $classNameCourierApiFactory = 'Sylapi\Courier\\'.$courierName.'\CourierApiFactory';
        $classNameSessionFactory = 'Sylapi\Courier\\'.$courierName.'\SessionFactory';

        $gateway = new $classNameCourierApiFactory(
            new $classNameSessionFactory()
        );

        return $gateway->create($credentials, $options);
    }

    private static function validateCourierName(string $courierName)
    {
        if (!class_exists('Sylapi\Courier\\'.$courierName.'\CourierApiFactory')
            || !class_exists('Sylapi\Courier\\'.$courierName.'\SessionFactory')
        ) {
            throw new InvalidArgumentException('Courier name is not valid');
        }
    }
}
