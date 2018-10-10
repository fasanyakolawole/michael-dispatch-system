<?php

/**
 * Interface ITransportMechanism
 * Defines a common interface for transport mechanisms.
 * Couriers all have a transport mechanism with which parcel is dispatched and couriers could
 * have similar transport mechanisms. A courier will accept a transport mechanism
 * as long as it conforms to this interface.
 */
interface ITransportMechanism {

    function dispatchParcel($parcel);

}