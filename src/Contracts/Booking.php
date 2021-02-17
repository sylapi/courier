<?php
declare(strict_types=1);

namespace Sylapi\Courier\Contracts;


interface Booking
{
    public function getShipmentId();
    public function setShipmentId(string $shipmentId);
}