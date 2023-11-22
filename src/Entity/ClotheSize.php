<?php

namespace App\Entity;

use App\Repository\ClotheSizeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClotheSizeRepository::class)]
class ClotheSize
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 20)]
    private ?string $clotheSize = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getClotheSize(): ?string
    {
        return $this->clotheSize;
    }

    public function setClotheSize(string $clotheSize): static
    {
        $this->clotheSize = $clotheSize;

        return $this;
    }
}
