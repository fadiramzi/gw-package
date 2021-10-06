<?php

namespace ninty9\superGW\gateways\amwal;

use ninty9\superGW\HttpC\Request;

class Amwal{
    
    private $_client;
    private $_response;
    private $_host;

    public function __construct()
    {
        $this->_host = Config("supergw.amwal.host");
    }

    /***
     * This function used for generating an Order number and return URL of payment form
     * @param array $info  [orderNumber, amount, currency, returnURL, failURL, descr, sessionTimeout]
     * @return object  return empty array if failed, otherwise an array contains all info wil be returned
     */
    public function initSession($info) 
    {
        $route = Config("supergw.amwal.endpoints.init");
        $contentType = Config("supergw.amwal.content_type");
        $info['profile_id'] = Env('AMWAL_PROFILE_ID');
        $this->_response = (new Request())->request(
            "POST",
            $this->_host,
            $route,
            $info,
            Env("AMWAL_SERVER_KEY"),
            $contentType
        );
       
        return $this->_response;
    }
}
?>