<?php

namespace Sylapi\Courier\Message;

abstract class AbstractRequest
{
    protected $responde;
    protected $parameters;
    protected $courierName;
    protected $adapter = null;

    public function setCourierName(String $name) {
        return $this->courierName =  $name;
    }

    public function initialize(array $parameters = array())  {
        return $this->parameters = $parameters;
    }

    public function getResponse() {
        return $this->responde['response'];
    }
    protected function setResponse($value) {
        return $this->responde['response'] = $value;
    }

    public function getError() {
        return (!empty($this->responde['error'])) ? $this->responde['error'] : null;
    }
    protected function setError($value) {
        if (!empty($value)) {
            return $this->responde['error'] = $value;
        }
    }

    public function getCode() {
        return $this->responde['code'];
    }
    protected function setCode($value) {
        return $this->responde['code'] = $value;
    }

    public function isSuccess() {
        return (empty($this->responde['error'])) ? true : false;
    }

    public function debug() {

        return [
            'name' => $this->courierName,
            'success' => $this->isSuccess(),
            'code' => $this->getCode(),
            'error' => $this->getError(),
            'response' => $this->getResponse(),
        ];
    }

    protected function adapter() {

        if ($this->adapter == null) {

            $courier_name = ucfirst(strtolower($this->courierName));

            $class_name = "\\Sylapi\\Courier\\" . $courier_name . "\\" . $courier_name;

            if (class_exists($class_name)) {

                $this->adapter = new $class_name();
                $this->adapter->initialize($this->parameters);

                if ($this->parameters['sandbox'] == true) {
                    $this->adapter->sandbox(true);
                }
            } else {
                $this->setError('Courier don\'t exist');
            }
        }

        return $this->adapter;
    }
}