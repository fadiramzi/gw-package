<?php
namespace ninty9\superGW\HttpC;

use GuzzleHttp\Client;

/***
 * This class used as a base class for http operations
 */

 // Constants
define("TIME_OUT",120);


class Request
{
    private $_client;
    private $_contentType;
    private $_response;


    public function __construct()
    {
        $this->_client = new Client();
    }

    /***
     * Used for returning current instance of http client
     */
    public function get()
    {
        return $this->_client;
    }

    /***
     * This function used for making request based on Guzzle package
     * @param $method string "POTS", "GET", "PUT", etc..
     * @param $host string Host Base URL
     * @param $route string route name of end-point
     * @param $data array this array contains data as key and value in case data must be passed as param, if data must be as json body, then it should be json object
     * @return   contains response message from the server
     */
    public function request($method
    ,$host
    ,$route
    ,$data,
    $authToken = "",
    $contentType = ""
    )
    {
        // append / to the end of the host
        // then append route of the end-point
        $host = $host.$route;
        $headers = [
            'Content-Type' => $contentType,
            'Accept' => 'application/json'
        ];
        if($authToken)
        {
            $headers['Authorization'] = $authToken;
        }
        $options =  [
            'headers' => $headers,
            'connect_timeout' => TIME_OUT, //sec
            'timeout' => TIME_OUT,
            'curl' => array(CURLOPT_SSL_VERIFYPEER => false),
            'http_errors' => false
        ];
        if($contentType == "application/json")
        {
            $options['body'] = json_encode($data);
        }
        if($contentType == "application/x-www-form-urlencoded")
        {
            $options['form_params'] = $data;
        }
        $resp = $this->_client->request(
                $method,
                $host,
                $options
           );
        $this->_response = $resp;
        return $resp->getBody()->getContents();
    }

    public function getStatusCode()
    {
        return $this->_response->getStatusCode();
    }

}
?>