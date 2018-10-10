<?php

include_once 'ICourier.php';

abstract class DefaultAbstractCourier implements ICourier {

    public $transportMechanism;

    public $parcelCounter;

    public function __construct($transportMechanism)
    {
        $this->transportMechanism = $transportMechanism;
        $this->parcelCounter = 0;
    }

    function generateUniqueId()
    {
        return "PARCEL- " . ++$this->parcelCounter;
    }

    function sendAParcel($parcel)
    {
        $this->transportMechanism->dispatchParcel($parcel);
    }
}