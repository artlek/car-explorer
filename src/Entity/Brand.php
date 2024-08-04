<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\BrandRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Metadata\ApiFilter;
use ApiPlatform\Doctrine\Orm\Filter\OrderFilter;
use Symfony\Component\Serializer\Annotation\Groups;

#[ApiResource]
#[GetCollection]
#[Get]
#[ApiFilter(SearchFilter::class, properties: [
    'name' => 'exact',
])]
#[ApiFilter(OrderFilter::class, properties: ['id', 'name'], arguments: ['orderParameterName' => 'order'])]
#[ORM\Entity(repositoryClass: BrandRepository::class)]
class Brand
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotNull()]
    #[Assert\NotBlank()]
    #[Assert\Regex('/^[a-zA-Z0-9\.,\s-]{2,30}$/', message: 'Invalid data. Only digits, letters and dot, comma and dash mark allowed. Min. 2 and max. 30 characters.')]
    #[Groups('car')]
    private ?string $name = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }
}
