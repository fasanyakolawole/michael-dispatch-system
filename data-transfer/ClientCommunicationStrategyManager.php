<?php

include_once 'JSONClientCommunicationStrategy.php';

class ClientCommunicationStrategyManager
{

    public static function getClientCommunicationHelper()
    {
        return new JSONClientCommunicationStrategy();
    }
}