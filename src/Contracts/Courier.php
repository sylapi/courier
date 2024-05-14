<?php

declare(strict_types=1);

namespace Sylapi\Courier\Contracts;

interface Courier extends CourierCreateShipment,
                          CourierPostShipment,
                          CourierGetLabels,
                          CourierGetStatuses,
                          CourierMakeShipment,
                          CourierMakeParcel,
                          CourierMakeReceiver,
                          CourierMakeSender,
                          CourierMakeBooking
{
}
