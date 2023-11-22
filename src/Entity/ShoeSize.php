<?php

namespace App\Entity;

use App\Repository\ShoeSizeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ShoeSizeRepository::class)]
class ShoeSize
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 20)]
    private ?string $shoeSize = null;

    #[ORM\ManyToMany(targetEntity: Shoe::class, mappedBy: 'shoeSize')]
    private Collection $shoes;

    public function __construct()
    {
        $this->shoes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getShoeSize(): ?string
    {
        return $this->shoeSize;
    }

    public function setShoeSize(string $shoeSize): static
    {
        $this->shoeSize = $shoeSize;

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
            $shoe->addShoeSize($this);
        }

        return $this;
    }

    public function removeShoe(Shoe $shoe): static
    {
        if ($this->shoes->removeElement($shoe)) {
            $shoe->removeShoeSize($this);
        }

        return $this;
    }
}
