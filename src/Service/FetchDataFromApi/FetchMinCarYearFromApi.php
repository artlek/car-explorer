<?php

namespace App\Service\FetchDataFromApi;

class FetchMinCarYearFromApi extends FetchDataFromApi
{
    protected string $string = "cars?pagination=true&itemsPerPage=1&order[year]=asc";
}