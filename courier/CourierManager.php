<?php

include_once 'courier-types.php';
include_once 'courier-impl/RoyalMailCourier.php';
include_once 'courier-impl/ANCCourier.php';
include_once 'courier-impl/TwilioCourier.php';
include_once 'transport-impl/EmailTransporter.php';
include_once 'transport-impl/SMSTransporter.php';

/**
 * Class CourierManager
 * This class is responsible for retrieving the courier to dispatch
 * a parcel.
 */
class CourierManager
{

    private $courierKeyToCourierMap;

    /**
     * CourierManager constructor.
     */
    public function __construct(){
        $this->courierKeyToCourierMap = [];
        $this->courierKeyToCourierMap[CourierTypes::ROYAL_MAIL] = new RoyalMailCourier(new EmailTransporter());
        $this->courierKeyToCourierMap[CourierTypes::ANC] = new ANCCourier(new SMSTransporter());
        $this->courierKeyToCourierMap[CourierTypes::TWILIO] = new TwilioCourier(new SMSTransporter());
    }

    public function getCourierForCourierKey($courierKey) {
        if(key_exists($courierKey, $this->courierKeyToCourierMap)) {
            return $this->courierKeyToCourierMap[$courierKey];
        }

        throw new Error("No courier implementation for courier key");
    }
}