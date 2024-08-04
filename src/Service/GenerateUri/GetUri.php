<?php

namespace App\Service\GenerateUri;

use App\Service\GenerateUri\GenerateUriBrand;
use App\Service\GenerateUri\GenerateUriModel;
use App\Service\GenerateUri\GenerateUriFuelType;
use App\Service\GenerateUri\GenerateUriBodyType;
use App\Service\GenerateUri\GenerateUriGearboxType;
use App\Service\GenerateUri\GenerateUriYearMin;
use App\Service\GenerateUri\GenerateUriYearMax;
use App\Service\GenerateUri\GenerateUriMileageMin;
use App\Service\GenerateUri\GenerateUriMileageMax;
use App\Service\GenerateUri\GenerateUriPriceMin;
use App\Service\GenerateUri\GenerateUriPriceMax;


class GetUri
{
    public function __construct(
        private GenerateUriBrand $generateUriBrand,
        private GenerateUriModel $generateUriModel,
        private GenerateUriFuelType $generateUriFuelType,
        private GenerateUriBodyType $generateUriBodyType,
        private GenerateUriGearboxType $generateUriGearboxType,
        private GenerateUriYearMin $generateUriYearMin,
        private GenerateUriYearMax $generateUriYearMax,
        private GenerateUriMileageMin $generateUriMileageMin,
        private GenerateUriMileageMax $generateUriMileageMax,
        private GenerateUriPriceMin $generateUriPriceMin,
        private GenerateUriPriceMax $generateUriPriceMax,
    )
    {
    }

    // gets api uri based on data form
    public function get($formData)
    {
        $uri = "cars?" . 
            $this->generateUriBrand->generate($formData["brand"]) .
            $this->generateUriModel->generate($formData["model"]) .
            $this->generateUriFuelType->generate($formData["fuelType"]) .
            $this->generateUriBodyType->generate($formData["bodyType"]) .
            $this->generateUriGearboxType->generate($formData["gearboxType"]) .
            $this->generateUriYearMin->generate($formData["yearMin"]) .
            $this->generateUriYearMax->generate($formData["yearMax"]) .
            $this->generateUriMileageMin->generate($formData["mileageMin"]) .
            $this->generateUriMileageMax->generate($formData["mileageMax"]) .
            $this->generateUriPriceMin->generate($formData["priceMin"]) .
            $this->generateUriPriceMax->generate($formData["priceMax"]);
        return $uri;
    }
}