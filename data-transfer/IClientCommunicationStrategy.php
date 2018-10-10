<?php

/**
 * Interface IDataTransferStrategy
 * Defines an interface for communicating with client.
 *
 */
interface IClientCommunicationStrategy{

    function sendError($error);

    function sendResult($result);

}