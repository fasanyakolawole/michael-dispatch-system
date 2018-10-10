<?php

include_once 'DispatchBatch.php';

/**
 * Class BatchManager
 * Handles the creation of batch.
 *
 * Ideally, there should be a mechanism for saving batch and retrieving already created batch.
 * Current implementation instantiates a dispatch batch on every request, which is not the expected behaviour.
 *
 * TODO: Implement a mechanism for retrieving started batch.
 */
class BatchManager
{
    private $batch;

    private $batchStarted = false;

    public function __construct(){

    }

    /**
     * @return DispatchBatch
    */

    public function startBatch(): DispatchBatch {
        if($this->batchStarted) {
            return $this->batch;
        }

        $this->batch = new DispatchBatch();
        return $this->batch;
    }

    /**
     * @return DispatchBatch
     * @throws Error
     */
    public function getBatch(): DispatchBatch {
        $this->batch = new DispatchBatch();
        return $this->batch;
    }

    public function endBatch() {

        $this->batch = new DispatchBatch();

        $this->batch->dispatchItems();
        $this->batch->close();
        $this->batch = null;

    }
}

