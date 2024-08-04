<?php

namespace App\Service\GetChoicesToForm;

use App\Service\FetchDataFromApi\FetchBodyTypesFromApi;

class GetBodyTypeChoices extends GetChoicesToForm
{
    public function fetchDataFromApiObject() 
    {
        $object = new FetchBodyTypesFromApi($this->client);
        return $object->fetch();
    }
}