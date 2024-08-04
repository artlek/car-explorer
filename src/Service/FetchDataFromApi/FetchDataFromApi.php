<?php

namespace App\Service\FetchDataFromApi;

use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use App\Service\GetUrlToApi;

abstract class FetchDataFromApi 
{
    protected const METHOD = "GET";
    protected string $string = "";

    public function __construct(public HttpClientInterface $client) 
    {
    }

    // fetches data from api based on passed string
    public function fetch() : array
    {
        $url = new GetUrlToApi();
        $uri = $url->get($this->string);
        try {
            $response = $this->client->request(self::METHOD, $uri);
            $content = $response->getContent();
            $content = $response->toArray();
            return $content;
        }
        catch (TransportExceptionInterface) {
            print('An error with api connection ocurred.');
        }
    }
}