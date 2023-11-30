<?php

namespace App\Entity;

use App\Repository\ClotheRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClotheRepository::class)]
class Clothe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $clotheName = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Image $image = null;

    #[ORM\ManyToMany(targetEntity: Color::class, inversedBy: 'clothes')]
    private Collection $clotheColor;

    #[ORM\ManyToMany(targetEntity: ClotheSize::class, inversedBy: 'clothes')]
    private Collection $clotheSize;

    #[ORM\ManyToOne(inversedBy: 'clothes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Brand $clotheBrand = null;

    public function __construct()
    {
        $this->clotheColor = new ArrayCollection();
        $this->clotheSize = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getClotheName(): ?string
    {
        return $this->clotheName;
    }

    public function setClotheName(string $clotheName): static
    {
        $this->clotheName = $clotheName;

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
    public function getClotheColor(): Collection
    {
        return $this->clotheColor;
    }

    public function addClotheColor(Color $clotheColor): static
    {
        if (!$this->clotheColor->contains($clotheColor)) {
            $this->clotheColor->add($clotheColor);
        }

        return $this;
    }

    public function removeClotheColor(Color $clotheColor): static
    {
        $this->clotheColor->removeElement($clotheColor);

        return $this;
    }

    /**
     * @return Collection<int, ClotheSize>
     */
    public function getClotheSize(): Collection
    {
        return $this->clotheSize;
    }

    public function addClotheSize(ClotheSize $clotheSize): static
    {
        if (!$this->clotheSize->contains($clotheSize)) {
            $this->clotheSize->add($clotheSize);
        }

        return $this;
    }

    public function removeClotheSize(ClotheSize $clotheSize): static
    {
        $this->clotheSize->removeElement($clotheSize);

        return $this;
    }

    public function getClotheBrand(): ?Brand
    {
        return $this->clotheBrand;
    }

    public function setClotheBrand(?Brand $clotheBrand): static
    {
        $this->clotheBrand = $clotheBrand;

        return $this;
    }
}
