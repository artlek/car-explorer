<?php

namespace App\Service\GenerateUri;

class GenerateUriBodyType extends GenerateUri
{
    protected string $prefix = "bodyType.name[]=";

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