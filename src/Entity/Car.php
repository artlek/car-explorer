<?php

namespace App\Entity;

use App\Repository\CarRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\ApiFilter;
use ApiPlatform\Doctrine\Orm\Filter\SearchFilter;
use App\Entity\Brand;
use ApiPlatform\Doctrine\Orm\Filter\RangeFilter;
use ApiPlatform\Doctrine\Orm\Filter\BooleanFilter;
use ApiPlatform\Doctrine\Orm\Filter\OrderFilter;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: CarRepository::class)]
#[ApiResource(normalizationContext: ['groups' => ['car']])]
#[GetCollection]
#[Get]
#[ApiFilter(SearchFilter::class, properties: [
    'brand.name' => 'exact', 
    'model' => 'partial',
    'bodyType.name' => 'exact',
    'fuelType.name' => 'exact',
    'gearboxType.name' => 'exact',
])]
#[ApiFilter(RangeFilter::class, properties: ['price', 'year', 'mileage'])]
#[ApiFilter(BooleanFilter::class, properties: ['availability'])]
#[ApiFilter(OrderFilter::class, properties: ['mileage', 'price', 'year'], arguments: ['orderParameterName' => 'order'])]
class Car
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups('car')]
    private ?int $id = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups('car')]
    #[Assert\NotNull()]
    #[Assert\NotBlank()]
    #[Assert\Regex('/^[a-zA-Z0-9\.,\s-]{2,30}$/', message: 'Invalid data. Only digits, letters and dot, comma and dash mark allowed. Min. 2 and max. 30 characters.')]
    private ?Brand $brand = null;

    #[Groups('car')]
    #[Assert\NotNull()]
    #[Assert\NotBlank()]
    #[Assert\Regex('/^[a-zA-Z0-9\.,\s-]{2,30}$/', message: 'Invalid data. Only digits, letters and dot, comma and dash mark allowed. Min. 2 and max. 30 characters.')]
    #[ORM\Column(length: 255)]
    private ?string $model = null;

    #[Groups('car')]
    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    #[Assert\NotNull()]
    #[Assert\NotBlank()]
    private ?BodyType $bodyType = null;

    #[Assert\NotNull()]
    #[Assert\NotBlank()]
    #[ORM\Column]
    #[Groups('car')]
    private ?int $year = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups('car')]
    #[Assert\NotNull()]
    #[Assert\NotBlank()]
    private ?FuelType $fuelType = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups('car')]
    #[Assert\NotNull()]
    #[Assert\NotBlank()]
    private ?GearboxType $gearboxType = null;

    #[Assert\NotNull()]
    #[Assert\NotBlank()]
    #[Assert\LessThan(1000000)]
    #[Assert\GreaterThan((0))]
    #[ORM\Column]
    #[Groups('car')]
    private ?int $mileage = null;

    #[Assert\NotNull()]
    #[Assert\NotBlank()]
    #[ORM\Column]
    #[Assert\LessThan(1000000000)]
    #[Assert\GreaterThan((0))]
    #[Groups('car')]
    private ?float $price = null;

    #[ORM\Column(nullable: true)]
    #[Groups('car')]
    private ?bool $availability = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBrand(): ?Brand
    {
        return $this->brand;
    }

    public function setBrand(?Brand $brand): static
    {
        $this->brand = $brand;

        return $this;
    }

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(string $model): static
    {
        $this->model = $model;

        return $this;
    }

    public function getBodyType(): ?BodyType
    {
        return $this->bodyType;
    }

    public function setBodyType(?BodyType $bodyType): static
    {
        $this->bodyType = $bodyType;

        return $this;
    }

    public function getYear(): ?int
    {
        return $this->year;
    }

    public function setYear(int $year): static
    {
        $this->year = $year;

        return $this;
    }

    public function getFuelType(): ?FuelType
    {
        return $this->fuelType;
    }

    public function setFuelType(?FuelType $fuelType): static
    {
        $this->fuelType = $fuelType;

        return $this;
    }

    public function getGearboxType(): ?GearboxType
    {
        return $this->gearboxType;
    }

    public function setGearboxType(?GearboxType $gearboxType): static
    {
        $this->gearboxType = $gearboxType;

        return $this;
    }

    public function getMileage(): ?int
    {
        return $this->mileage;
    }

    public function setMileage(int $mileage): static
    {
        $this->mileage = $mileage;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function isAvailability(): ?bool
    {
        return $this->availability;
    }

    public function setAvailability(?bool $availability): static
    {
        $this->availability = $availability;

        return $this;
    }
}
