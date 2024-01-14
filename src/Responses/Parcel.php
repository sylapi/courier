<?php

declare(strict_types=1);

namespace Sylapi\Courier\Responses;

use Sylapi\Courier\Abstracts\Response as ResponseAbstract;
use Sylapi\Courier\Contracts\Response as ResponseContract;

class Parcel extends ResponseAbstract implements ResponseContract
{
    private ?string $shipmentId;
    private ?string $trackingId;
    private ?string $trackingUrl;

    public function setShipmentId(string $shipmentId): Parcel
    {
        $this->shipmentId = $shipmentId;

        return $this;
    }

    public function getShipmentId(): ?string
    {
        return $this->shipmentId;
    }


    public function setTrackingId(string $trackingId): Parcel
    {
        $this->trackingId = $trackingId;

        return $this;
    }

    public function getTrackingId(): ?string
    {
        return $this->trackingId;
    }

    public function setTrackingUrl(string $trackingUrl): Parcel
    {
        $this->trackingUrl = $trackingUrl;

        return $this;
    }

    public function getTrackingUrl(): ?string
    {
        return $this->trackingUrl;
    }
}
