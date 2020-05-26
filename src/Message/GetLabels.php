<?php

namespace Sylapi\Courier\Message;

/**
 * Class GetLabels
 * @package Sylapi\Courier\Message
 */
class GetLabels extends AbstractRequest
{
    /**
     * @var array
     */
    private $label_vars = [
        'trackings' => [],
        'custom_id' => '',
        'format' => '',
        'type' => ''
    ];

    /**
     * Check and complet label fields
     */
    public function validate() {

        foreach($this->label_vars as $lname => $value) {
            if (!isset($this->parameters[$lname])) {

                $this->parameters[$lname] = $value;
            }
        }
    }

    /**
     * Send request to GetLabels method
     */
    public function sendData() {

        $this->validate();

        $adapter = $this->adapter();
        if (!empty($adapter)) {

            $adapter->GetLabels();

            if ($adapter->isSuccess()) {

                $this->setResponse($adapter->getResponse());
            }

            $this->setError($adapter->getError());
            $this->setCode($adapter->getCode());
        }
    }
}