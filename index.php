<?php

include_once 'RequestHelper.php';
include_once 'courier/CourierManager.php';
include_once 'data-transfer/ClientCommunicationStrategyManager.php';
include_once 'common/BatchManager.php';
include_once 'common/Consignment.php';


$requestHelper = new RequestHelper();
$requestAction = $requestHelper->getRequestAction();

$clientCommunicationHelper = ClientCommunicationStrategyManager::getClientCommunicationHelper();

$courierManager = new CourierManager();
$batchManager = new BatchManager();

switch ($requestAction) {

    case "start_batch":
        $dispatchBatch = $batchManager->startBatch();
        $clientCommunicationHelper->sendResult("Batch started.");
        break;

    case "add_consignment":
        $dispatchBatch = $batchManager->getBatch();
        $parcelRequest = $requestHelper->getPostData();

        if (!key_exists('courier', $parcelRequest)) {
            $clientCommunicationHelper->sendError("No courier in request.");
            return;
        }

        $courierKey = $parcelRequest['courier'];
        try {
            $courier = $courierManager->getCourierForCourierKey($courierKey);

            if ($courier == null) {
                $clientCommunicationHelper->sendError("No courier available with specified courier key");
                return;
            }

            $dispatchBatch->addConsignment(new Consignment($parcelRequest, $courier));
            $clientCommunicationHelper->sendResult("Parcel added successfully");
        } catch (Error $er) {
            $clientCommunicationHelper->sendError("No courier available with specified courier key");
        }
        break;

    case "end_batch":
        $batchManager->endBatch();
        $clientCommunicationHelper->sendResult("Batch ended.");
        break;
    default:
        $clientCommunicationHelper->sendResult("Hello there, no request from you.");
        break;

}

