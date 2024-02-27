<?php

declare(strict_types=1);

namespace Sylapi\Courier\Contracts;

use Sylapi\Courier\Contracts\Options;

interface Shipment extends Validatable
{
    public function getReferenceId(): ?string;

    public function setReferenceId(string $referenceId): self;

    public function getExternalId(): ?string;

    public function setExternalId(string $externalId): self;

    public function getSender(): ?Sender;

    public function setSender(Sender $sender): self;

    public function getReceiver(): ?Receiver;

    public function setReceiver(Receiver $receiver): self;

    public function getParcel(): ?Parcel;

    public function setParcel(Parcel $parcel): self;

    public function getContent(): ?string;

    public function setContent(string $content): self;

    public function getQuantity(): int;

    public function getWeight(): float;

    public function addService(Service $service): self;

    public function getServices(): array;

    public function setOptions(Options $options): self;

    public function getOptions(): Options;
}
