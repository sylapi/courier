<?php

namespace Sylapi\Courier\Message;

class ValidateData extends AbstractRequest
{
    private $address_types = [
        'sender',
        'receiver',
    ];

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
