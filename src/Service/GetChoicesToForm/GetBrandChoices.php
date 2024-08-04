<?php

namespace App\Service\GetChoicesToForm;

use App\Service\FetchDataFromApi\FetchBrandsFromApi;

class GetBrandChoices extends GetChoicesToForm
{    
    public function fetchDataFromApiObject() 
    {
        $object = new FetchBrandsFromApi($this->client);
        return $object->fetch();
    }
}