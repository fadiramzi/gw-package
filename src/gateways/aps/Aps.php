<?php
namespace ninty9\superGW\gateways\Aps;

use ninty9\superGW\HttpC\Request;


class Aps
{
    private $_client;
    private $_response;
    private $_host;
    /***
     * Constructor, this constructor init a client http requet for next step
     */
    public function __construct()
    {
        $this->_host = Config("supergw.aps.host");
    }

    /***
     * This function used for generating an Order number and return URL of payment form
     * @param array $info  [orderNumber, amount, currency, returnURL, failURL, descr, sessionTimeout]
     * @return object  return empty array if failed, otherwise an array contains all info wil be returned
     */
    public function initSession($info) 
    {
        $info["userName"] = Env("APS_USERNAME");
        $info["password"] = Env("APS_PASSWORD");
        $route = Config("supergw.aps.endpoints.init");
        $contentType = Config("supergw.aps.content_type");
      
        $this->_response = (new Request())->request("POST",$this->_host,$route,$info,"",$contentType);
       
        return $this->_response;
    }
   
    /***
     * @param $info array data that will be send as param within URL
     * @return object returned that contains order status
     */
    public function checkOrder($info)
    {
        $info["userName"] = Env("APS_USERNAME");
        $info["password"] = Env("APS_PASSWORD");
        $route = Config("supergw.aps.endpoints.check_order_status");
        $this->_response = (new Request())->request("POST",$this->_host,$route,$info);
        $decodedJson = json_decode($this->_response);
        return $decodedJson;
    }
}

?>