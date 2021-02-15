<?php

namespace Sylapi\Courier\Message;

/**
 * Class ValidateData.
 */
class ValidateData extends AbstractRequest
{
    /**
     * @var array
     */
    private $address_types = [
        'sender',
        'receiver',
    ];

    /**
     * @var array
     */
    private $address_vars = [
        'name'     => '',
        'company'  => '',
        'street'   => '',
        'postcode' => '',
        'city'     => '',
        'country'  => '',
        'phone'    => '',
        'email'    => '',
    ];

    /**
     * @var array
     */
    private $options_vars = [
        'weight'      => '',
        'width'       => '',
        'height'      => '',
        'depth'       => '',
        'amount'      => '',
        'bank_number' => '',
        'cod'         => false,
        'saturday'    => false,
        'custom'      => null,
        'references'  => '',
        'note'        => '',
    ];

    /**
     * Check and complet package fields.
     */
    public function validate()
    {
        foreach ($this->address_types as $tname) {
            foreach ($this->address_vars as $vname => $value) {
                if (!isset($this->parameters[$tname][$vname])) {
                    $this->parameters[$tname][$vname] = $value;
                }
            }
        }

        foreach ($this->options_vars as $oname => $value) {
            if (!isset($this->parameters['options'][$oname])) {
                $this->parameters['options'][$oname] = $value;
            }
        }
    }

    /**
     * Send request to ValidateData method.
     */
    public function sendData()
    {
        $this->validate();

        $adapter = $this->adapter();
        if (!empty($adapter)) {
            $adapter->ValidateData();

            if ($adapter->isSuccess()) {
                $this->setResponse($adapter->getResponse());
            }

            $this->setError($adapter->getError());
            $this->setCode($adapter->getCode());
        }
    }
}
