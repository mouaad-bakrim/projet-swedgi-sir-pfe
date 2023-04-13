<?php

namespace App\Entity;

use App\Repository\TacheRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TacheRepository::class)]
class Tache
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $CNSS = null;

    #[ORM\Column(length: 10)]
    private ?string $IR = null;

    #[ORM\Column]
    private ?float $salaire = null;

    #[ORM\Column]
    private ?float $tVA = null;

    #[ORM\Column(length: 255)]
    private ?string $juridique = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCNSS(): ?string
    {
        return $this->CNSS;
    }

    public function setCNSS(string $CNSS): self
    {
        $this->CNSS = $CNSS;

        return $this;
    }

    public function getIR(): ?string
    {
        return $this->IR;
    }

    public function setIR(string $IR): self
    {
        $this->IR = $IR;

        return $this;
    }

    public function getSalaire(): ?float
    {
        return $this->salaire;
    }

    public function setSalaire(float $salaire): self
    {
        $this->salaire = $salaire;

        return $this;
    }

    public function getTVA(): ?float
    {
        return $this->tVA;
    }

    public function setTVA(float $tVA): self
    {
        $this->tVA = $tVA;

        return $this;
    }

    public function getJuridique(): ?string
    {
        return $this->juridique;
    }

    public function setJuridique(string $juridique): self
    {
        $this->juridique = $juridique;

        return $this;
    }
}
