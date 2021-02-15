<?php

namespace Sylapi\Courier\Message;

/**
 * Class GetLabel.
 */
class GetLabel extends AbstractRequest
{
    /**
     * @var array
     */
    private $label_vars = [
        'tracking_id' => '',
        'custom_id'   => '',
        'format'      => '',
        'type'        => '',
    ];

    /**
     *  Check and complet label fields.
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
     * Send request to GetLabel method.
     */
    public function sendData()
    {
        $this->validate();

        $adapter = $this->adapter();
        if (!empty($adapter)) {
            $adapter->GetLabel();

            if ($adapter->isSuccess()) {
                $this->setResponse($adapter->getResponse());
            }

            $this->setError($adapter->getError());
            $this->setCode($adapter->getCode());
        }
    }
}
