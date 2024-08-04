<?php

namespace App\Service\FetchDataFromApi;

class FetchBodyTypesFromApi extends FetchDataFromApi
{
    protected string $string = "body_types?pagination=false&order[name]=asc";
}