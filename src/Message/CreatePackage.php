<?php

namespace Sylapi\Courier\Message;

use Sylapi\Courier\Common\Helper;

/**
 * Class CreatePackage.
 */
class CreatePackage extends AbstractRequest
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
        'hour10'      => false,
        'hour12'      => false,
        'custom'      => null,
        'references'  => '',
        'note'        => '',
    ];

    /**
     * Check and complet address fields.
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

            if (in_array($oname, ['amount', 'weight', 'depth', 'width', 'height'])) {
                $this->parameters['options'][$oname] = Helper::toAmonut($this->parameters['options'][$oname]);
            }
        }
    }

    /**
     * @return bool
     */
    public function sendData()
    {
        $this->validate();

        $adapter = $this->adapter();

        if (!empty($adapter)) {
            $adapter->CreatePackage();

            if ($adapter->isSuccess()) {
                $result = [
                    'tracking_id' => 0,
                    'custom_id'   => 0,
                    'price'       => 0,
                ];

                $response = $adapter->getResponse();

                if (!empty($response) && is_array($response)) {
                    foreach ($response as $key => $value) {
                        if (in_array($key, $result)) {
                            $result[$key] = $value;
                        }
                    }
                } else {
                    $this->setError('Tracking ID is empty');
                    $this->setCode('500');

                    return false;
                }

                $this->setResponse($result);
            }

            $this->setError($adapter->getError());
            $this->setCode($adapter->getCode());
        }
    }
}
