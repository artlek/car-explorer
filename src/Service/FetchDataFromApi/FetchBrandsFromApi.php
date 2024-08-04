<?php

namespace App\Service\FetchDataFromApi;

class FetchBrandsFromApi extends FetchDataFromApi
{
    protected string $string = "brands?pagination=false&order[name]=asc";
}