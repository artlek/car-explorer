<?php

namespace App\Service\GenerateUri;

class GenerateUriFuelType extends GenerateUri
{
    protected string $prefix = "fuelType.name[]=";

    public function generate($value) : string
    {
        if($value !== null) {
            foreach($value as $type) {
                $this->result = $this->result . $this->prefix . $type . $this->suffix;
            }
        }
        return $this->result;
    }
}