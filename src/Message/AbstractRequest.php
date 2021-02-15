<?php

namespace Sylapi\Courier\Message;

/**
 * Class AbstractRequest.
 */
abstract class AbstractRequest
{
    /**
     * @var
     */
    protected $responde;
    /**
     * @var
     */
    protected $parameters;
    /**
     * @var
     */
    protected $courierName;
    /**
     * @var null
     */
    protected $adapter = null;

    /**
     * @param string $name
     *
     * @return string
     */
    public function setCourierName(string $name)
    {
        return $this->courierName = $name;
    }

    /**
     * @param array $parameters
     *
     * @return array
     */
    public function initialize(array $parameters = [])
    {
        return $this->parameters = $parameters;
    }

    /**
     * @return mixed
     */
    public function getResponse()
    {
        return $this->responde['response'];
    }

    /**
     * @param $value
     *
     * @return mixed
     */
    protected function setResponse($value)
    {
        return $this->responde['response'] = $value;
    }

    /**
     * @return |null
     */
    public function getError()
    {
        return (!empty($this->responde['error'])) ? $this->responde['error'] : null;
    }

    /**
     * @param $value
     *
     * @return mixed
     */
    protected function setError($value)
    {
        if (!empty($value)) {
            return $this->responde['error'] = $value;
        }
    }

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->responde['code'];
    }

    /**
     * @param $value
     *
     * @return mixed
     */
    protected function setCode($value)
    {
        return $this->responde['code'] = $value;
    }

    /**
     * @return bool
     */
    public function isSuccess()
    {
        return (empty($this->responde['error'])) ? true : false;
    }

    /**
     * @return array
     */
    public function debug()
    {
        return [
            'name'     => $this->courierName,
            'success'  => $this->isSuccess(),
            'code'     => $this->getCode(),
            'error'    => $this->getError(),
            'response' => $this->getResponse(),
        ];
    }

    /**
     * @return null
     */
    protected function adapter()
    {
        if ($this->adapter == null) {
            $courier_name = ucfirst(strtolower($this->courierName));

            $class_name = '\\Sylapi\\Courier\\'.$courier_name.'\\'.$courier_name;

            if (class_exists($class_name)) {
                $this->adapter = new $class_name();
                $this->adapter->initialize($this->parameters);

                if (isset($this->parameters['sandbox']) && $this->parameters['sandbox'] == true) {
                    $this->adapter->sandbox(true);
                }
            } else {
                $this->setError('Courier don\'t exist');
            }
        }

        return $this->adapter;
    }
}
