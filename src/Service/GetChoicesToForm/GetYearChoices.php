<?php

namespace App\Service\GetChoicesToForm;

use Symfony\Contracts\HttpClient\HttpClientInterface;
use App\Service\FetchDataFromApi\FetchMinCarYearFromApi;
use App\Service\FetchDataFromApi\FetchMaxCarYearFromApi;

class GetYearChoices
{   
    private array $choices = [];

    public function __construct(private HttpClientInterface $client)
    {
    }

    public function get() 
    {
        $firstYear = new FetchMinCarYearFromApi($this->client);
        $lastYear = new FetchMaxCarYearFromApi($this->client);
        $min = $firstYear->fetch()["hydra:member"][0]["year"];
        $max = $lastYear->fetch()["hydra:member"][0]["year"];
        $this->choices["firstYear"] = $min;
        $this->choices["lastYear"] = $max;
        return $this->choices;
    }
}