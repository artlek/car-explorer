<?php

namespace App\Service\FetchDataFromApi;

class FetchCarsFromApi extends FetchDataFromApi
{
    protected string $string = "";

    public function setString($string)
    {
        $this->string = $string;
    }
}