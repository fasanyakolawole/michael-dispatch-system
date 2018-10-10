<?php

/**
 * Class Consignment
 * A consignment is a parcel and the courier responsible for dispatching the courier.
 */

class Consignment
{

    private $uniqueId;

    private $parcel;

    private $courier;

    /**
     * Consignment constructor.
     * @param $parcel
     * @param $courier
     */
    public function __construct($parcel, ICourier $courier)
    {
        $this->parcel = $parcel;
        $this->courier = $courier;
        $this->uniqueId = $courier->generateUniqueId();
    }


    /**
     * @return mixed
     */
    public function getUniqueId()
    {
        return $this->uniqueId;
    }

    /**
     * @param mixed $uniqueId
     */
    public function setUniqueId($uniqueId)
    {
        $this->uniqueId = $uniqueId;
    }

    /**
     * @return mixed
     */
    public function getParcel()
    {
        return $this->parcel;
    }

    /**
     * @param mixed $parcel
     */
    public function setParcel($parcel)
    {
        $this->parcel = $parcel;
    }

    /**
     * @return mixed
     */
    public function getCourier()
    {
        return $this->courier;
    }

    /**
     * @param mixed $courier
     */
    public function setCourier($courier)
    {
        $this->courier = $courier;
    }



}