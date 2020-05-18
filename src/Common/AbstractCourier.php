<?php

namespace Sylapi\Courier\Common;

/**
 * Class AbstractCourier.
 */
abstract class AbstractCourier
{
    /**
     * @var
     */
    protected $courier;
    /**
     * @var
     */
    protected $response;
    /**
     * @var array
     */
    protected $errors;
    /**
     * @var array
     */
    protected $params = [];

    /**
     * @param bool $sandobx
     */
    public function sandbox(bool $sandobx)
    {
        $this->params['sandbox'] = $sandobx;
    }

    /**
     * @param string $login
     */
    public function setLogin(string $login)
    {
        $this->params['accessData']['login'] = $login;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password)
    {
        $this->params['accessData']['password'] = $password;
    }

    /**
     * @param string $key
     */
    public function setKey(string $key)
    {
        $this->params['accessData']['key'] = $key;
    }

    /**
     * @param string $token
     */
    public function setToken(string $token)
    {
        $this->params['accessData']['token'] = $token;
    }

    /**
     * @param array $data
     */
    public function setProvider(string $provider)
    {
        $this->params['provider'] = $provider;
    }

    /**
     * @param array $data
     */
    public function setService(string $service)
    {
        $this->params['service'] = $service;
    }

    /**
     * @param array $data
     */
    public function setParcelShop(string $parcelshop)
    {
        $this->params['parcelshop'][] = $parcelshop;
    }

    /**
     * @param array $data
     */
    public function setSender(array $data = [])
    {
        $this->params['sender'] = $data;
    }

    /**
     * @param array $data
     */
    public function setReceiver(array $data = [])
    {
        $this->params['receiver'] = $data;
    }

    /**
     * @param array $data
     */
    public function setOptions(array $data = [])
    {
        $this->params['options'] = $data;
    }

    /**
     * @return mixed
     */
    public function getParameter(array $keys = [])
    {
        $value = $this->params;
        foreach ($keys as $key) {
            if (isset($value[$key])) {
                $value = $value[$key];
            } else {
                return null;
            }
        }

        return $value;
    }

    /**
     * @return mixed
     */
    public function setResponse($data)
    {
        return $this->response = $data;
    }

    /**
     * @return mixed
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @return mixed
     */
    public function getError()
    {
        return $this->errors;
    }

    /**
     * @param array $data
     */
    protected function setError(array $data = [])
    {
        $this->errors = $data;
    }

    public function debug()
    {
        return [
            'error'    => $this->getError(),
            'response' => $this->getResponse(),
        ];
    }

    /**
     * @param $class
     * @param array $parameters
     *
     * @return mixed
     */
    protected function createRequest($class, array $parameters = [])
    {
        $obj = new $class();

        if (!empty($this->params)) {
            foreach ($this->params as $key => $value) {
                if (!empty($value)) {
                    $parameters[$key] = $value;
                }
            }
        }

        $obj->setCourierName($this->courier);
        $obj->initialize($parameters);
        $obj->sendData();

        return $obj;
    }
}
