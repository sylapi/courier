<?php

namespace Sylapi\Courier\Message;

/**
 * Class DeletePackage
 * @package Sylapi\Courier\Message
 */
class DeletePackage extends AbstractRequest
{
    /**
     * @var array
     */
    private $label_vars = [
        'tracking_id' => '',
        'custom_id' => '',
    ];

    /**
     * Check and complet address fields
     */
    public function validate() {

        foreach($this->label_vars as $lname => $value) {
            if (!isset($this->parameters[$lname])) {

                $this->parameters[$lname] = $value;
            }
        }
    }

    /**
     * Send request to DeletePackage method
     */
    public function sendData() {

        $this->validate();

        $adapter = $this->adapter();
        if (!empty($adapter)) {

            $adapter->DeletePackage();

            if ($adapter->isSuccess()) {

                $this->setResponse($adapter->getResponse());
            }

            $this->setError($adapter->getError());
            $this->setCode($adapter->getCode());
        }
    }
}