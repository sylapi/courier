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

    public function setShipmentId(string $ShipmentId): Parcel
    {
        $this->shipmentId = $ShipmentId;

        return $this;
    }

    public function getShipmentId(): ?string
    {
        return $this->shipmentId;
    }


    public function setTrackingId(string $TrackingId): Parcel
    {
        $this->trackingId = $TrackingId;

        return $this;
    }

    public function getTrackingId(): ?string
    {
        return $this->trackingId;
    }

    public function setTrackingUrl(string $TrackingUrl): Parcel
    {
        $this->trackingUrl = $TrackingUrl;

        return $this;
    }

    public function getTrackingUrl(): ?string
    {
        return $this->trackingUrl;
    }
}
