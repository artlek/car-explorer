<?php

namespace App\Service\FetchDataFromApi;

class FetchMaxCarYearFromApi extends FetchDataFromApi
{
    protected string $string = "cars?pagination=true&itemsPerPage=1&order[year]=desc";
}