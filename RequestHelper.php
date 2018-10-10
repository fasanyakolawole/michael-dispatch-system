<?php

/**
 * Class RequestHelper
 * Responsible for extracting data from clients.
 * It extracts all forms of data, i.e. $_GET or $_POST data.
 */
class RequestHelper{

    public function getRequestAction(){

        if(key_exists("action", $_GET)){
            return $_GET['action'];
        }

        return "";
    }

    public function getPostData(){
        return $_POST;
    }
}
?>
