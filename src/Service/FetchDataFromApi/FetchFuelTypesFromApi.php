<?php

namespace App\Service\FetchDataFromApi;

class FetchFuelTypesFromApi extends FetchDataFromApi
{
    protected string $string = "fuel_types?pagination=false&order[name]=asc";
}