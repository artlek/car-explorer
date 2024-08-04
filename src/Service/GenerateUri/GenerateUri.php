<?php

namespace App\Service\GenerateUri;

abstract class GenerateUri
{
    protected string $prefix;
    protected string $suffix = "&";
    protected string $result = "";

    // generates piece of api uri based on data from concrete form field
    public function generate($value) : string
    {
        if($value !== null)
        {
            $this->result = $this->prefix . $value . $this->suffix;
        }
        return $this->result;
    }
}