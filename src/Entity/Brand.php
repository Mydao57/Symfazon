<?php

namespace App\Entity;

use App\Repository\BrandRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BrandRepository::class)]
class Brand
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $brandName = null;

    #[ORM\OneToMany(mappedBy: 'shoeBrand', targetEntity: Shoe::class)]
    private Collection $shoes;

    #[ORM\OneToMany(mappedBy: 'clotheBrand', targetEntity: Clothe::class)]
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

    public function getBrandName(): ?string
    {
        return $this->brandName;
    }

    public function setBrandName(string $brandName): static
    {
        $this->brandName = $brandName;

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
            $shoe->setShoeBrand($this);
        }

        return $this;
    }

    public function removeShoe(Shoe $shoe): static
    {
        if ($this->shoes->removeElement($shoe)) {
            // set the owning side to null (unless already changed)
            if ($shoe->getShoeBrand() === $this) {
                $shoe->setShoeBrand(null);
            }
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
            $clothes->setClotheBrand($this);
        }

        return $this;
    }

    public function removeClothes(Clothe $clothes): static
    {
        if ($this->clothes->removeElement($clothes)) {
            // set the owning side to null (unless already changed)
            if ($clothes->getClotheBrand() === $this) {
                $clothes->setClotheBrand(null);
            }
        }

        return $this;
    }
}
