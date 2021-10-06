<?php
namespace ninty9\superGW\gateways\switchGW;

use ninty9\superGW\HttpC\Request;

class SwitchGW
{
    private $_client;
    private $_response;
    private $_host;

    public function __construct()
    {
        $this->_host = Config("supergw.switch.host");   
    }
}
?>

