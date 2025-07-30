<?php

declare(strict_types=1);

namespace Sylapi\Courier\Enums;


class StatusType {
    public const APP_UNAVAILABLE = 'app_unavailable';
    public const APP_RESPONSE_ERROR = 'app_response_error';
    public const NEW = 'new';
    public const CANCELLED = 'cancelled';
    public const DELIVERED = 'delivered';
    public const ENTRY_WAIT = 'entry_wait';
    public const ORDERED = 'ordered';
    public const SENT = 'sent';
    public const SPEDITION_DELIVERY = 'spedition_delivery';
    public const PICKUP_READY = 'pickup_ready';
    public const LOST = 'lost';
    public const REFUND = 'refund';
    public const WAREHOUSE_ENTRY = 'warehouse_entry';
    public const RETURN_DELIVERY = 'return_delivery';
    public const SOLVING = 'solving';
    public const RETURNING = 'returning_back';
    public const RETURNED = 'returned';
    public const PROCESSING = 'processing';
    public const PROCESSING_FAILED = 'processing_failed';
    public const DELETED = 'deleted';

}

