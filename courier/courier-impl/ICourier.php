<?php

interface ICourier{

    function generateUniqueId();

    function sendAParcel($parcel);

}