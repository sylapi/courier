<?php

namespace Sylapi\Courier;

use Sylapi\Courier\Common\AbstractCourier;
use Sylapi\Courier\Common\HelperValidate;

class Courier extends AbstractCourier
{
    public function __construct($courier = null)
    {
        $this->courier = $courier;
    }

    public function validateAddress($name = 'receiver')
    {
        $validate = HelperValidate::validateAddress($this->params[$name]);

        if (is_array($validate)) {
            $this->setError($validate);

            return false;
        }

        return true;
    }

    public function validateData(array $parameters = [])
    {
        return $this->createRequest('\Sylapi\Courier\Message\ValidateData', $parameters);
    }

    public function checkPrice(array $parameters = [])
    {
        return $this->createRequest('\Sylapi\Courier\Message\CheckPrice', $parameters);
    }

    public function getPackage(array $parameters = [])
    {
        return $this->createRequest('\Sylapi\Courier\Message\GetPackage', $parameters);
    }

    public function createPackage(array $parameters = [])
    {
        return $this->createRequest('\Sylapi\Courier\Message\CreatePackage', $parameters);
    }

    public function deletePackage(array $parameters = [])
    {
        return $this->createRequest('\Sylapi\Courier\Message\DeletePackage', $parameters);
    }

    public function getLabel(array $parameters = [])
    {
        return $this->createRequest('\Sylapi\Courier\Message\GetLabel', $parameters);
    }

    public function getParcel(array $parameters = [])
    {
        return $this->createRequest('\Sylapi\Courier\Message\GetParcel', $parameters);
    }
}
