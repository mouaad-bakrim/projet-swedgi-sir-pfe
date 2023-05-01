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



    #[ORM\Column(nullable: true)]
    private ?string $duree = null;


    #[ORM\ManyToOne(inversedBy: 'periodicites')]
    private ?Tache $tacheType = null;

    /**
     * @return Tache|null
     */
    public function getTacheType(): ?Tache
    {
        return $this->tacheType;
    }

    /**
     * @param Tache|null $tacheType
     */
    public function setTacheType(?Tache $tacheType): void
    {
        $this->tacheType = $tacheType;
    }

    #[ORM\ManyToOne(inversedBy: 'periodicites')]
    private ?tache $tache = null;



    public function getId(): ?int
    {
        return $this->id;
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

    public function getTache(): ?tache
    {
        return $this->tache;
    }

    public function setTache(?tache $tache): self
    {
        $this->tache = $tache;

        return $this;
    }























}