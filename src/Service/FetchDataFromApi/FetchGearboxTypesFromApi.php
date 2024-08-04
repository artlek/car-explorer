<?php

namespace App\Service\FetchDataFromApi;

class FetchGearboxTypesFromApi extends FetchDataFromApi
{
    protected string $string = "gearbox_types?pagination=false&order[name]=asc";
}