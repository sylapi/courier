<?php
namespace Sylapi\Courier;

use Sylapi\Courier\Exceptions\InvalidArgumentException;

class CourierFactory {

    public static function create(String $courierName, array $parameters)
    {
        self::validateCourierName($courierName);
        
        $classNameCourierApiFactory = 'Sylapi\Courier\\'.$courierName.'\\'.$courierName.'CourierApiFactory';
        $classNameSessionFactory = 'Sylapi\Courier\\'.$courierName.'\\'.$courierName.'SessionFactory';

        $gateway = new $classNameCourierApiFactory(
            new $classNameSessionFactory()
        );    
        return $gateway->create($parameters);
    }


    private static function validateCourierName(string $courierName)
    {
        if ( !class_exists('Sylapi\Courier\\'.$courierName.'\\'.$courierName.'CourierApiFactory')
            || !class_exists('Sylapi\Courier\\'.$courierName.'\\'.$courierName.'SessionFactory')
        )
        {
            throw new InvalidArgumentException('Courier name is not valid');
        }
    }
}