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
    private ?string $libellé = null;

    #[ORM\Column(length: 255)]
    private ?string $Description = null;

    #[ORM\Column(length: 255)]
    private ?string $code_groupe = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibellé(): ?string
    {
        return $this->libellé;
    }

    public function setLibellé(string $libellé): self
    {
        $this->libellé = $libellé;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    public function getCodeGroupe(): ?string
    {
        return $this->code_groupe;
    }

    public function setCodeGroupe(string $code_groupe): self
    {
        $this->code_groupe = $code_groupe;

        return $this;
    }
}
