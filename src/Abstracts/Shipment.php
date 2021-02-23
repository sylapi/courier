<?php

declare(strict_types=1);

namespace Sylapi\Courier\Abstracts;

use Sylapi\Courier\Contracts\Parcel;
use Sylapi\Courier\Contracts\Receiver;
use Sylapi\Courier\Contracts\Sender;
use Sylapi\Courier\Contracts\Shipment as ShipmentContract;
use Sylapi\Courier\Traits\Validatable;

abstract class Shipment implements ShipmentContract
{
    use Validatable;

    private $externalId;
    private $referenceId;
    private $sender;
    private $receiver;
    private $parcel;
    private $parcels;
    private $content;

    public function getReferenceId(): string
    {
        return $this->referenceId;
    }

    public function setReferenceId(string $referenceId): ShipmentContract
    {
        $this->referenceId = $referenceId;

        return $this;
    }

    public function getExternalId(): string
    {
        return $this->externalId;
    }

    public function setExternalId(string $externalId): ShipmentContract
    {
        $this->externalId = $externalId;

        return $this;
    }

    public function getSender(): Sender
    {
        return $this->sender;
    }

    public function setSender(Sender $sender): ShipmentContract
    {
        $this->sender = $sender;

        return $this;
    }

    public function getReceiver(): Receiver
    {
        return $this->receiver;
    }

    public function setReceiver(Receiver $receiver): ShipmentContract
    {
        $this->receiver = $receiver;

        return $this;
    }

    public function getParcel(): Parcel
    {
        return $this->parcel;
    }

    public function setParcel(Parcel $parcel): ShipmentContract
    {
        $this->parcel = $parcel;
        $this->parcels = [$parcel];

        return $this;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): ShipmentContract
    {
        $this->content = $content;

        return $this;
    }

    public function getWeight(): float
    {
        $weight = 0;
        foreach ($this->parcels as $parcel) {
            $weight += $parcel->getWeight();
        }

        return $weight;
    }

    public function getQuantity(): int
    {
        return (is_array($this->parcels)) ? count($this->parcels) : 0;
    }
}
