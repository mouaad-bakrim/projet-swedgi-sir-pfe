<?php

namespace App\Entity;

use App\Repository\CategorieRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategorieRepository::class)]
class Categorie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $libellee = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    private ?string $codeGroupe = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibellee(): ?string
    {
        return $this->libellee;
    }

    public function setLibellee(string $libellee): self
    {
        $this->libellee = $libellee;

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

    public function getCodeGroupe(): ?string
    {
        return $this->codeGroupe;
    }

    public function setCodeGroupe(string $codeGroupe): self
    {
        $this->codeGroupe = $codeGroupe;

        return $this;
    }
}
