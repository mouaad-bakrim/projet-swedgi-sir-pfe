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

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;


    #[ORM\ManyToOne(inversedBy: 'taches')]
    private ?Periodicite $Periodicite = null;

    #[ORM\OneToMany(mappedBy: 'Tache', targetEntity: Contrat::class)]
    private Collection $contrats;

    #[ORM\ManyToOne(inversedBy: 'taches')]
    private ?Task $Task = null;

    #[ORM\Column(length: 255)]
    private ?string $designation = null;

    public function __construct()
    {
        $this->contrats = new ArrayCollection();
    }



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPeriodicite(): ?Periodicite
    {
        return $this->Periodicite;
    }
    public function setPeriodicite(?Periodicite $Periodicite): self
    {
        $this->Periodicite = $Periodicite;

        return $this;
    }

    /**
     * @return Collection<int, Contrat>
     */
    public function getContrats(): Collection
    {
        return $this->contrats;
    }

    public function addContrat(Contrat $contrat): self
    {
        if (!$this->contrats->contains($contrat)) {
            $this->contrats->add($contrat);
            $contrat->setTache($this);
        }

        return $this;
    }

    public function removeContrat(Contrat $contrat): self
    {
        if ($this->contrats->removeElement($contrat)) {
            // set the owning side to null (unless already changed)
            if ($contrat->getTache() === $this) {
                $contrat->setTache(null);
            }
        }

        return $this;
    }
    public function __toString()
    {
        return $this ->designation;
    }

    public function getTask(): ?Task
    {
        return $this->Task;
    }

    public function setTask(?Task $Task): self
    {
        $this->Task = $Task;

        return $this;
    }

    public function getDesignation(): ?string
    {
        return $this->designation;
    }

    public function setDesignation(string $designation): self
    {
        $this->designation = $designation;

        return $this;
    }
}