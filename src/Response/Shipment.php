<?php

declare(strict_types=1);

namespace Sylapi\Courier\Response;

use Sylapi\Courier\Abstracts\Response as ResponseAbstract;
use Sylapi\Courier\Contracts\Response as ResponseContract;

class Shipment extends ResponseAbstract implements ResponseContract
{
    private $shipmentId;

    public function setShipmentId(string $ShipmentId): ResponseContract
    {
        $this->shipmentId = $ShipmentId;

        return $this;
    }

    public function getShipmentId(): ?string
    {
        return $this->shipmentId;
    }
}
