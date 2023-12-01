<?php

declare(strict_types=1);

namespace Sylapi\Courier\Abstracts;

use Sylapi\Courier\Contracts\Parcel;
use Sylapi\Courier\Contracts\Sender;
use Sylapi\Courier\Contracts\Options;
use Sylapi\Courier\Contracts\Service;
use Sylapi\Courier\Contracts\Receiver;
use Sylapi\Courier\Traits\Validatable;
use Sylapi\Courier\Contracts\Shipment as ShipmentContract;

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
    private $services = [];
    private $options = [];

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

    public function getSender(): ?Sender
    {
        return $this->sender;
    }

    public function setSender(Sender $sender): ShipmentContract
    {
        $this->sender = $sender;

        return $this;
    }

    public function getReceiver(): ?Receiver
    {
        return $this->receiver;
    }

    public function setReceiver(Receiver $receiver): ShipmentContract
    {
        $this->receiver = $receiver;

        return $this;
    }

    public function getParcel(): ?Parcel
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

    public function addService(Service $service): ShipmentContract
    {
        $this->services[] = $service;

        return $this;
    }

    public function getServices(): array
    {
        return $this->services;
    }

    public function setOptions(Options $options): ShipmentContract
    {
        $this->options = $options;

        return $this;
    }

    public function getOptions(): Options
    {
        return $this->options;
    }
}
