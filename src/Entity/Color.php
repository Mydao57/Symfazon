<?php

namespace App\Entity;

use App\Repository\ColorRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ColorRepository::class)]
class Color
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $colorName = null;

    #[ORM\ManyToMany(targetEntity: Shoe::class, mappedBy: 'shoeColor')]
    private Collection $shoes;

    #[ORM\ManyToMany(targetEntity: Clothe::class, mappedBy: 'clotheColor')]
    private Collection $clothes;

    public function __construct()
    {
        $this->shoes = new ArrayCollection();
        $this->clothes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getColorName(): ?string
    {
        return $this->colorName;
    }

    public function setColorName(string $colorName): static
    {
        $this->colorName = $colorName;

        return $this;
    }

    /**
     * @return Collection<int, Shoe>
     */
    public function getShoes(): Collection
    {
        return $this->shoes;
    }

    public function addShoe(Shoe $shoe): static
    {
        if (!$this->shoes->contains($shoe)) {
            $this->shoes->add($shoe);
            $shoe->addShoeColor($this);
        }

        return $this;
    }

    public function removeShoe(Shoe $shoe): static
    {
        if ($this->shoes->removeElement($shoe)) {
            $shoe->removeShoeColor($this);
        }

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
            $clothes->addClotheColor($this);
        }

        return $this;
    }

    public function removeClothes(Clothe $clothes): static
    {
        if ($this->clothes->removeElement($clothes)) {
            $clothes->removeClotheColor($this);
        }

        return $this;
    }
}
