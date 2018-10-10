<?php

include_once 'ICourier.php';


class RoyalMailCourier implements ICourier {

    private $transportMechanism;

    public function __construct($myTransportMechanism){
        $this->transportMechanism = $myTransportMechanism;
    }

    function generateUniqueId()
    {
        $now = new DateTime();
        return $now->getTimestamp();
    }

    function sendAParcel($parcel)
    {
        $this->transportMechanism->dispatchParcel($parcel);
    }

}