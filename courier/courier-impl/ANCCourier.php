<?php

include_once 'ICourier.php';
include_once 'DefaultAbstractCourier.php';

class ANCCourier extends DefaultAbstractCourier implements ICourier{

    function generateUniqueId()
    {
        return "ANC-PARCEL-" . ++$this->parcelCounter;
    }

}