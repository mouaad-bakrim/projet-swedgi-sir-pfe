<?php

namespace App\Entity;

use App\Repository\ContratRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ContratRepository::class)]
class Contrat
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;


    #[ORM\Column(length: 255)]
    private ?string $montant = null;

    /**
     * @return string|null
     */
    public function getMontant(): ?string
    {
        return $this->montant;
    }

    /**
     * @param string|null $montant
     */
    public function setMontant(?string $montant): void
    {
        $this->montant = $montant;
    }

    #[ORM\ManyToOne(inversedBy: 'Client')]
    private ?Client $client = null;

    #[ORM\ManyToOne(inversedBy: 'Contrat')]
    private ?Tache $tacheType = null;

    #[ORM\ManyToOne(inversedBy: 'contrats')]
    private ?tache $tache = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateDebut = null;





    public function getId(): ?int
    {
        return $this->id;
    }





    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): self
    {
        $this->client = $client;

        return $this;
    }

    public function getTacheType(): ?Tache
    {
        return $this->tacheType;
    }

    public function setTacheType(?Tache $tacheType): self
    {
        $this->tacheType = $tacheType;

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

    public function __toString()
    {
        return $this ->montant;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->dateDebut;
    }

    public function setDateDebut(\DateTimeInterface $dateDebut): self
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }









}
