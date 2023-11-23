<?php

declare(strict_types=1);

namespace Sylapi\Courier\Enums;


enum StatusType: string {
    case APP_UNAVAILABLE = 'app_unavailable';
    case APP_RESPONSE_ERROR = 'app_response_error';
    case NEW = 'new';
    case CANCELLED = 'cancelled';
    case DELIVERED = 'delivered';
    case ENTRY_WAIT = 'entry_wait';
    case ORDERED = 'ordered';
    case SENT = 'sent';
    case SPEDITION_DELIVERY = 'spedition_delivery';
    case PICKUP_READY = 'pickup_ready';
    case LOST = 'lost';
    case REFUND = 'refund';
    case WAREHOUSE_ENTRY = 'warehouse_entry';
    case RETURN_DELIVERY = 'return_delivery';
    case SOLVING = 'solving';
    case RETURNING = 'returning_back';
    case RETURNED = 'returned';
    case PROCESSING = 'processing';
    case PROCESSING_FAILED = 'processing_failed';
    case DELETED = 'deleted';
}

