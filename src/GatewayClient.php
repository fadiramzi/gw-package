<?php
namespace ninty9\superGW;

use ninty9\superGW\gateways\amwal\Amwal;
use ninty9\superGW\gateways\aps\Aps;
use ninty9\superGW\gateways\switchGW\SwitchGW;
use ninty9\superGW\gateways\zaincash\ZainCash;


// Constants
define("APS", "aps");
define("ZAIN_CASH", "zain_cash");
define("SWITCH", "switch");
define("AMWAL", "amwal");
class GatewayClient
{
    private $_client;
    
    public function __construct($name)
    { 
        switch($name)
        {
            case APS:
                $this->_client = new Aps();
                break;
            case ZAIN_CASH:
                $this->_client = new ZainCash();
                break;
            case ZAIN_CASH:
                $this->_client = new SwitchGW();
                    break;
            case AMWAL:
                $this->_client = new Amwal();
                    break;
        }
    }
    public function get()
    {
        return $this->_client;
    }


}

?>