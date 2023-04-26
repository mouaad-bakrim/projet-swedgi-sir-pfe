<?php

namespace App\Entity;

use App\Repository\TacheTypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TacheTypeRepository::class)]
class TacheType
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $designation = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\OneToMany(mappedBy: 'tacheType', targetEntity: Contrat::class)]
    private Collection $Contrat;

    public function __construct()
    {
        $this->Contrat = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection<int, Contrat>
     */
    public function getContrat(): Collection
    {
        return $this->Contrat;
    }

    public function addContrat(Contrat $contrat): self
    {
        if (!$this->Contrat->contains($contrat)) {
            $this->Contrat->add($contrat);
            $contrat->setTacheType($this);
        }

        return $this;
    }

    public function removeContrat(Contrat $contrat): self
    {
        if ($this->Contrat->removeElement($contrat)) {
            // set the owning side to null (unless already changed)
            if ($contrat->getTacheType() === $this) {
                $contrat->setTacheType(null);
            }
        }

        return $this;
    }
}
