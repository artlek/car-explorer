<?php

namespace App\Service\GetChoicesToForm;

use App\Service\FetchDataFromApi\FetchGearboxTypesFromApi;

class GetGearboxTypeChoices extends GetChoicesToForm
{
    public function fetchDataFromApiObject() 
    {
        $object = new FetchGearboxTypesFromApi($this->client);
        return $object->fetch();
    }
}