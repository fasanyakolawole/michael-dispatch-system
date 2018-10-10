<?php


class DispatchBatch
{

    private $startTime;

    private $endTime;

    private $consignments;

    public function __construct(){
        $this->startTime = new DateTime();
    }

    public function addConsignment(Consignment $consignment): bool {

        if(!is_array($this->consignments)) {
            $this->consignments = [];
        }

        $this->consignments[] = $consignment;
        return true;
    }

    public function dispatchItems() {

        if(!is_array($this->consignments) || sizeof($this->consignments) < 1){
            return;
        }

        foreach ($this->consignments as $consignment) {
            $courier = $consignment->getCourier();
            $courier->sendAParcel($consignment->getParcel());
        }

    }

    public function close() {
        $this->endTime = new DateTime();

    }

}