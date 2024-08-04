<?php

namespace App\Service;

class GetUrlToApi
{
    private string $apiServer;
    private string $apiPort;
    private string $prefix = "/api/";

    public function __construct()
    {
        $this->apiServer = $_ENV['API_SERVER'];
        $this->apiPort = $_ENV['API_PORT'];
    }

    // gets api url based on passed string
    public function get($string)
    {
        $url = $this->apiServer . ":" . $this->apiPort . $this->prefix . $string;
        return $url;
    }

    public function setApiPort($apiPort)
    {
        $this->apiPort = $apiPort;
    }

    public function setApiServer($apiServer)
    {
        $this->apiServer = $apiServer;
    }

    public function setPrefix($prefix)
    {
        $this->prefix = $prefix;
    }
}