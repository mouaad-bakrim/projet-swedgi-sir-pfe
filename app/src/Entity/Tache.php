<?php

namespace App\Entity;

use App\Repository\TacheRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TacheRepository::class)]
class Tache
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $designation = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\ManyToOne(inversedBy: 'tache')]
    private ?Periodicite $periodicite = null;

    #[ORM\OneToMany(mappedBy: 'tache', targetEntity: Periodicite::class)]
    private Collection $periodicites;

    public function __construct()
    {
        $this->periodicites = new ArrayCollection();
    }





    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDesignation(): ?string
    {
        return $this->designation;
    }

    public function setDesignation(?string $designation): self
    {
        $this->designation = $designation;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }




    public function __toString()
    {
        return $this ->designation;
    }

    public function getPeriodicite(): ?Periodicite
    {
        return $this->periodicite;
    }

    public function setPeriodicite(?Periodicite $periodicite): self
    {
        $this->periodicite = $periodicite;

        return $this;
    }

    /**
     * @return Collection<int, Periodicite>
     */
    public function getPeriodicites(): Collection
    {
        return $this->periodicites;
    }

    public function addPeriodicite(Periodicite $periodicite): self
    {
        if (!$this->periodicites->contains($periodicite)) {
            $this->periodicites->add($periodicite);
            $periodicite->setTache($this);
        }

        return $this;
    }

    public function removePeriodicite(Periodicite $periodicite): self
    {
        if ($this->periodicites->removeElement($periodicite)) {
            // set the owning side to null (unless already changed)
            if ($periodicite->getTache() === $this) {
                $periodicite->setTache(null);
            }
        }

        return $this;
    }



}

