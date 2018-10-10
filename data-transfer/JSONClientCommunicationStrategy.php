<?php

include_once 'IClientCommunicationStrategy.php';
include_once 'APIResponse.php';

/**
 * Class JSONClientCommunicationStrategy
 * TODO: Implement method for converting object to JSON.
 */

class JSONClientCommunicationStrategy implements IClientCommunicationStrategy
{
    function sendError($error)
    {
        $response = new APIResponse(false, null, [$error]);
        echo json_encode($error);
    }

    /**
     * @param $result

     */
    function sendResult($result)
    {
        $response = new APIResponse(true, $result, []);
        echo json_encode($result);
    }


}