<?php

namespace Sylapi\Courier\Message;

/**
 * Class GetPackage.
 */
class GetPackage extends AbstractRequest
{
    /**
     * @var array
     */
    private $label_vars = [
        'tracking_id' => '',
        'custom_id'   => '',
    ];

    /**
     * Check and complet label fields.
     */
    public function validate()
    {
        foreach ($this->label_vars as $lname => $value) {
            if (!isset($this->parameters[$lname])) {
                $this->parameters[$lname] = $value;
            }
        }
    }

    /**
     * Send request to GetPackage method.
     */
    public function sendData()
    {
        $this->validate();

        $adapter = $this->adapter();
        if (!empty($adapter)) {
            $adapter->GetPackage();

            if ($adapter->isSuccess()) {
                $this->setResponse($adapter->getResponse());
            }

            $this->setError($adapter->getError());
            $this->setCode($adapter->getCode());
        }
    }
}
