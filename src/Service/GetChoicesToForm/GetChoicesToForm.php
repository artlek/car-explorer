<?php

namespace App\Service\GetChoicesToForm;

use Symfony\Contracts\HttpClient\HttpClientInterface;

abstract class GetChoicesToForm
{
    private array $choices = [];

    public function __construct(protected HttpClientInterface $client)
    {
    }

    public function fetchDataFromApiObject() 
    {
    }

    public function get() : array
    {   
        $rows = $this->fetchDataFromApiObject()["hydra:member"];
        foreach($rows as $row) {
            $this->choices[$row['name']] = $row['name'];
        }
        return $this->choices;
    }
}