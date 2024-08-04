<?php

namespace App\Service;

use App\Service\GenerateUri\GetUri;
use App\Service\FetchDataFromApi\FetchCarsFromApi;

class GetCarsFromApi
{
    public function __construct(private GetUri $getUri, private FetchCarsFromApi $fetchCarsFromApi)
    {
    }

    // gets array of cars fetched from api
    public function get($formData) : array
    {
        $uri = $this->getUri->get($formData);
        $this->fetchCarsFromApi->setString($uri);
        return $this->fetchCarsFromApi->fetch()["hydra:member"];
    }
}