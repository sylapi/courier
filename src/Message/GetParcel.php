<?php

namespace Sylapi\Courier\Message;

/**
 * Class GetParcel
 * @package Sylapi\Courier\Message
 */
class GetParcel extends AbstractRequest
{
    /**
     * @return bool
     */
    public function validate() {

        return true;
    }

    /**
     * Send request to GetParcel method
     */
    public function sendData() {

        $this->validate();

        $adapter = $this->adapter();
        if (!empty($adapter)) {

            $adapter->GetParcel();

            if ($adapter->isSuccess()) {

                $this->setResponse($adapter->getResponse());
            }

            $this->setError($adapter->getError());
            $this->setCode($adapter->getCode());
        }
    }
}