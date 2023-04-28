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


/*
    #[ORM\OneToMany(mappedBy: 'tache', targetEntity: Contrat::class)]
    private Collection $contrats;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?periodicite $periodicite = null;

    public function __construct()
    {
        $this->contrats = new ArrayCollection();
    }
*/
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




  #  /**
   #  * @return Collection<int, Contrat>
    # */
/*    public function getContrats(): Collection
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

    public function getPeriodicite(): ?periodicite
    {
        return $this->periodicite;
    }

    public function setPeriodicite(?periodicite $periodicite): self
    {
        $this->periodicite = $periodicite;

        return $this;
    }

*/
}

