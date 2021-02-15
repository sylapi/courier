<?php

namespace Sylapi\Courier;

use Sylapi\Courier\Common\AbstractCourier;
use Sylapi\Courier\Common\HelperValidate;

/**
 * Class Courier.
 */
class Courier extends AbstractCourier
{
    /**
     * Courier constructor.
     *
     * @param null $courier
     */
    public function __construct($courier = null)
    {
        $this->courier = $courier;
    }

    /**
     * @param string $name
     *
     * @return bool
     */
    public function validateAddress($name = 'receiver')
    {
        $validate = HelperValidate::validateAddress($this->params[$name]);

        if (is_array($validate)) {
            $this->setError($validate);

            return false;
        }

        return true;
    }

    /**
     * @param array $parameters
     *
     * @return mixed
     */
    public function validateData(array $parameters = [])
    {
        return $this->createRequest('\Sylapi\Courier\Message\ValidateData', $parameters);
    }

    /**
     * @param array $parameters
     *
     * @return mixed
     */
    public function checkPrice(array $parameters = [])
    {
        return $this->createRequest('\Sylapi\Courier\Message\CheckPrice', $parameters);
    }

    /**
     * @param array $parameters
     *
     * @return mixed
     */
    public function getPackage(array $parameters = [])
    {
        return $this->createRequest('\Sylapi\Courier\Message\GetPackage', $parameters);
    }

    /**
     * @param array $parameters
     *
     * @return mixed
     */
    public function createPackage(array $parameters = [])
    {
        return $this->createRequest('\Sylapi\Courier\Message\CreatePackage', $parameters);
    }

    /**
     * @param array $parameters
     *
     * @return mixed
     */
    public function deletePackage(array $parameters = [])
    {
        return $this->createRequest('\Sylapi\Courier\Message\DeletePackage', $parameters);
    }

    /**
     * @param array $parameters
     *
     * @return mixed
     */
    public function getLabel(array $parameters = [])
    {
        return $this->createRequest('\Sylapi\Courier\Message\GetLabel', $parameters);
    }

    /**
     * @param array $parameters
     *
     * @return mixed
     */
    public function getLabels(array $parameters = [])
    {
        return $this->createRequest('\Sylapi\Courier\Message\GetLabels', $parameters);
    }

    /**
     * @param array $parameters
     *
     * @return mixed
     */
    public function getParcel(array $parameters = [])
    {
        return $this->createRequest('\Sylapi\Courier\Message\GetParcel', $parameters);
    }
}
