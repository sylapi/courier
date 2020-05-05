<?php

namespace Sylapi\Courier\Common;

/**
 * Class AbstractCourier
 * @package Sylapi\Courier\Common
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
    public function sandbox(bool $sandobx) {
        $this->params['sandbox'] = $sandobx;
    }

    /**
     * @param String $login
     */
    public function setLogin(String $login) {
        $this->params['accessData']['login'] = $login;
    }

    /**
     * @param String $password
     */
    public function setPassword(String $password) {
        $this->params['accessData']['password'] = $password;
    }

    /**
     * @param String $key
     */
    public function setKey(String $key) {
        $this->params['accessData']['key'] = $key;
    }

    /**
     * @param String $token
     */
    public function setToken(String $token) {
        $this->params['accessData']['token'] = $token;
    }

    /**
     * @param array $data
     */
    public function setProvider(String $provider) {
        $this->params['provider'] = $provider;
    }

    /**
     * @param array $data
     */
    public function setService(String $service) {
        $this->params['services'][] = $service;
    }

    /**
     * @param array $data
     */
    public function setParcelShop(String $parcelshop) {
        $this->params['parcelshop'][] = $parcelshop;
    }

    /**
     * @param array $data
     */
    public function setSender(array $data = array()) {
        $this->params['sender'] = $data;
    }

    /**
     * @param array $data
     */
    public function setReceiver(array $data = array()) {
        $this->params['receiver'] = $data;
    }

    /**
     * @param array $data
     */
    public function setOptions(array $data = array()) {
        $this->params['options'] = $data;
    }

    /**
     * @return mixed
     */
    public function getParameter(array $keys = array()) {
        $value = $this->params;
        foreach($keys as $key) {
            if (isset($value[$key])) {
                $value = $value[$key];
            }
            else {
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
    public function getResponse() {
        return $this->response;
    }

    /**
     * @return mixed
     */
    public function getError() {
        return $this->errors;
    }

    /**
     * @param array $data
     */
    protected function setError(array $data = array()) {
        $this->errors = $data;
    }

    public function debug() {

        return [
            'error' => $this->getError(),
            'response' => $this->getResponse(),
        ];
    }

    /**
     * @param $class
     * @param array $parameters
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
