<?php

namespace App\Enums;

class OrderStatusEnum
{
    const OPEN = 'open'; //when a buyer creates an order it will keep waiting for 10 days in this status.
    const  DECLINED = 'declined'; //if  the seller declines the order within 10 days.
    const  EXPIRED = 'expired'; //if  the seller doesn't accept within 10 days, the order will be expired.
    const PROCESSING = 'processing'; //if the order is accepted by the seller within 10 days.
    const DELIVERED = 'delivered'; //order completed by the seller, and after open for rivision
    const RIVISION = 'rivision'; // if the buyer returns the order after review for revission within 3 days max.
    const REJECTED = 'rejected'; //buyer can reject the order after 1 rivision completes
    const DISPUTE = 'dispute'; // when there is any dispute between buyer and seller. This is possible after 1 rivision completes.
    const  CONFIRMED = 'confirmed'; //buyer can do this within 3 days after delivered.
    const  COMPLETED = 'completed'; //the status will be updated automatically after 3 days if buyer doesn't perform any action.

    public static function getList(): array
    {
        return [
            self::OPEN,
            self::DECLINED,
            self::EXPIRED,
            self::PROCESSING,
            self::DELIVERED,
            self::RIVISION,
            self::REJECTED,
            self::DISPUTE,
            self::CONFIRMED,
            self::COMPLETED

        ];
    }
}
