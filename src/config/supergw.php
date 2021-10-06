<?php

return array(
    'aps' => array(
        "host"=> "https://uat-proxy.aps.iq:5443",
        "endpoints"=> array(
            "init" => "/rest/register.do",
            "check_order_status" => "/rest/getOrderStatus.do"
        ),
        "content_type"=>"application/x-www-form-urlencoded"
        ),
    'switch'=>array(
        "host"=>"https://test.oppwa.com",
        "endpoints"=>array(
            "init"=>"/v1/checkouts"
        ),
        "content_type"=>"application/x-www-form-urlencoded"
        ),
    'zain_cash'=>array(
            "host"=>"https://test.zaincash.iq",
            "endpoints"=>array(
                "init"=>"/transaction/init"
            ),
            "content_type"=>"application/x-www-form-urlencoded"
            ),
    'amwal'=>array(
            "host"=>"https://secure-iraq.paytabs.com",
            "endpoints"=>array(
                "init"=>"/payment/request"
            )
            ,
            "content_type"=>"application/json"
            ),

    'tasdid'=>array(
            "host"=>"",
                "endpoints"=>array(
                            "init"=>""
                ),
                "content_type"=>"application/json"
                )
);

?>