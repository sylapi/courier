<?php

declare(strict_types=1);

namespace Sylapi\Courier\Enums;

use Sylapi\Courier\Abstracts\Enum;

class StatusType extends Enum
{
    const APP_RESPONSE_ERROR = 'app_response_error';
    const NEW = 'new';
    const CANCELLED = 'cancelled';
    const DELIVERED = 'delivered';
    const ENTRY_WAIT = 'entry_wait';
    const ORDERED = 'ordered';
    const SENT = 'sent';
    const SPEDITION_DELIVERY = 'spedition_delivery';
    const PICKUP_READY = 'pickup_ready';
    const LOST = 'lost';
    const REFUND = 'refund';
    const WAREHOUSE_ENTRY = 'warehouse_entry';
    const RETURN_DELIVERY = 'return_delivery';
    const SOLVING = 'solving';
    const RETURNING = 'returning_back';
    const RETURNED = 'returned';
    const PROCESSING = 'processing';
    const PROCESSING_FAILED = 'processing_failed';
    const DELETED = 'deleted';
}
