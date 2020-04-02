<?php

namespace Sylapi\Courier\Message;

class GetParcel extends AbstractRequest
{
    public function validate() {

        return true;
    }

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