<?php

namespace App\Entity;

use App\Repository\ClotheSizeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    #[ORM\ManyToMany(targetEntity: Clothe::class, mappedBy: 'clotheSize')]
    private Collection $clothes;

    public function __construct()
    {
        $this->clothes = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, Clothe>
     */
    public function getClothes(): Collection
    {
        return $this->clothes;
    }

    public function addClothes(Clothe $clothes): static
    {
        if (!$this->clothes->contains($clothes)) {
            $this->clothes->add($clothes);
            $clothes->addClotheSize($this);
        }

        return $this;
    }

    public function removeClothes(Clothe $clothes): static
    {
        if ($this->clothes->removeElement($clothes)) {
            $clothes->removeClotheSize($this);
        }

        return $this;
    }
}
