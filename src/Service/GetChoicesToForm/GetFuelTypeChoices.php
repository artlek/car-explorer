<?php

namespace App\Service\GetChoicesToForm;

use App\Service\FetchDataFromApi\FetchFuelTypesFromApi;

class GetFuelTypeChoices extends GetChoicesToForm
{
    public function fetchDataFromApiObject() 
    {
        $object = new FetchFuelTypesFromApi($this->client);
        return $object->fetch();
    }
}