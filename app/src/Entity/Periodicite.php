<?php

namespace App\Entity;

use App\Repository\PeriodiciteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PeriodiciteRepository::class)]
class Periodicite
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $designation = null;

    #[ORM\Column(nullable: true)]
    private ?string $duree = null;

    #[ORM\Column]
    private ?bool $direct = null;

    #[ORM\OneToMany(mappedBy: 'periodicite', targetEntity: tache::class)]
    private Collection $tache;



    public function __construct()
    {
        $this->taches = new ArrayCollection();
        $this->tache = new ArrayCollection();
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

    public function getDuree(): ?string
    {
        return $this->duree;
    }

    public function setDuree(?string $duree): self
    {
        $this->duree = $duree;

        return $this;
    }

    public function isDirect(): ?bool
    {
        return $this->direct;
    }

    public function setDirect(bool $direct): self
    {
        $this->direct = $direct;

        return $this;
    }

    /**
     * @return Collection<int, Tache>
     */
    public function getTaches(): Collection
    {
        return $this->taches;
    }

    /**
     * @return Collection<int, tache>
     */
    public function getTache(): Collection
    {
        return $this->tache;
    }

    public function addTache(tache $tache): self
    {
        if (!$this->tache->contains($tache)) {
            $this->tache->add($tache);
            $tache->setPeriodicite($this);
        }

        return $this;
    }

    public function removeTache(tache $tache): self
    {
        if ($this->tache->removeElement($tache)) {
            // set the owning side to null (unless already changed)
            if ($tache->getPeriodicite() === $this) {
                $tache->setPeriodicite(null);
            }
        }

        return $this;
    }
















}