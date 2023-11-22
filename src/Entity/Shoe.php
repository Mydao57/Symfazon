<?php

namespace App\Entity;

use App\Repository\ShoeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ShoeRepository::class)]
class Shoe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $shoeName = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Image $image = null;


    #[ORM\ManyToMany(targetEntity: Color::class, inversedBy: 'shoes')]
    private Collection $shoeColor;

    #[ORM\ManyToMany(targetEntity: ShoeSize::class, inversedBy: 'shoes')]
    private Collection $shoeSize;

    #[ORM\ManyToOne(inversedBy: 'shoes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Brand $shoeBrand = null;

    public function __construct()
    {
        $this->shoeColor = new ArrayCollection();
        $this->shoeSize = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getShoeName(): ?string
    {
        return $this->shoeName;
    }

    public function setShoeName(string $shoeName): static
    {
        $this->shoeName = $shoeName;

        return $this;
    }

    public function getImage(): ?Image
    {
        return $this->image;
    }

    public function setImage(?Image $image): static
    {
        $this->image = $image;

        return $this;
    }

    /**
     * @return Collection<int, Color>
     */
    public function getShoeColor(): Collection
    {
        return $this->shoeColor;
    }

    public function addShoeColor(Color $shoeColor): static
    {
        if (!$this->shoeColor->contains($shoeColor)) {
            $this->shoeColor->add($shoeColor);
        }

        return $this;
    }

    public function removeShoeColor(Color $shoeColor): static
    {
        $this->shoeColor->removeElement($shoeColor);

        return $this;
    }

    /**
     * @return Collection<int, ShoeSize>
     */
    public function getShoeSize(): Collection
    {
        return $this->shoeSize;
    }

    public function addShoeSize(ShoeSize $shoeSize): static
    {
        if (!$this->shoeSize->contains($shoeSize)) {
            $this->shoeSize->add($shoeSize);
        }

        return $this;
    }

    public function removeShoeSize(ShoeSize $shoeSize): static
    {
        $this->shoeSize->removeElement($shoeSize);

        return $this;
    }

    public function getShoeBrand(): ?Brand
    {
        return $this->shoeBrand;
    }

    public function setShoeBrand(?Brand $shoeBrand): static
    {
        $this->shoeBrand = $shoeBrand;

        return $this;
    }
}
