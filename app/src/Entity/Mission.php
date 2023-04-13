<?php

namespace App\Entity;

use App\Repository\MissionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MissionRepository::class)]
class Mission
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $CNSS = null;

    #[ORM\Column]
    private ?float $IR = null;

    #[ORM\Column]
    private ?float $salaire = null;

    #[ORM\Column(length: 255)]
    private ?string $juridique = null;

    #[ORM\Column(length: 255)]
    private ?string $cAC = null;

    #[ORM\Column(length: 255)]
    private ?string $audit = null;

    #[ORM\Column]
    private ?float $augmentationCapital = null;

    #[ORM\Column(length: 255)]
    private ?string $constitution = null;

    #[ORM\Column(length: 255)]
    private ?string $transformationPP = null;

    #[ORM\Column(length: 255)]
    private ?string $cessionPart = null;

    #[ORM\Column(length: 255)]
    private ?string $livreCoteParaphe = null;

    #[ORM\Column(length: 255)]
    private ?string $taxeProfessionnelle = null;

    #[ORM\Column(length: 255)]
    private ?string $tenueComptabilite = null;

    #[ORM\Column(length: 255)]
    private ?string $controle = null;

    #[ORM\Column(length: 255)]
    private ?string $revision = null;

    #[ORM\Column(length: 255)]
    private ?string $saisie = null;

    #[ORM\Column(length: 255)]
    private ?string $aCompteIs = null;

    #[ORM\Column(length: 255)]
    private ?string $bilan = null;

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

    public function getIR(): ?float
    {
        return $this->IR;
    }

    public function setIR(float $IR): self
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

    public function getJuridique(): ?string
    {
        return $this->juridique;
    }

    public function setJuridique(string $juridique): self
    {
        $this->juridique = $juridique;

        return $this;
    }

    public function getCAC(): ?string
    {
        return $this->cAC;
    }

    public function setCAC(string $cAC): self
    {
        $this->cAC = $cAC;

        return $this;
    }

    public function getAudit(): ?string
    {
        return $this->audit;
    }

    public function setAudit(string $audit): self
    {
        $this->audit = $audit;

        return $this;
    }

    public function getAugmentationCapital(): ?float
    {
        return $this->augmentationCapital;
    }

    public function setAugmentationCapital(float $augmentationCapital): self
    {
        $this->augmentationCapital = $augmentationCapital;

        return $this;
    }

    public function getConstitution(): ?string
    {
        return $this->constitution;
    }

    public function setConstitution(string $constitution): self
    {
        $this->constitution = $constitution;

        return $this;
    }

    public function getTransformationPP(): ?string
    {
        return $this->transformationPP;
    }

    public function setTransformationPP(string $transformationPP): self
    {
        $this->transformationPP = $transformationPP;

        return $this;
    }

    public function getCessionPart(): ?string
    {
        return $this->cessionPart;
    }

    public function setCessionPart(string $cessionPart): self
    {
        $this->cessionPart = $cessionPart;

        return $this;
    }

    public function getLivreCoteParaphe(): ?string
    {
        return $this->livreCoteParaphe;
    }

    public function setLivreCoteParaphe(string $livreCoteParaphe): self
    {
        $this->livreCoteParaphe = $livreCoteParaphe;

        return $this;
    }

    public function getTaxeProfessionnelle(): ?string
    {
        return $this->taxeProfessionnelle;
    }

    public function setTaxeProfessionnelle(string $taxeProfessionnelle): self
    {
        $this->taxeProfessionnelle = $taxeProfessionnelle;

        return $this;
    }

    public function getTenueComptabilite(): ?string
    {
        return $this->tenueComptabilite;
    }

    public function setTenueComptabilite(string $tenueComptabilite): self
    {
        $this->tenueComptabilite = $tenueComptabilite;

        return $this;
    }

    public function getControle(): ?string
    {
        return $this->controle;
    }

    public function setControle(string $controle): self
    {
        $this->controle = $controle;

        return $this;
    }

    public function getRevision(): ?string
    {
        return $this->revision;
    }

    public function setRevision(string $revision): self
    {
        $this->revision = $revision;

        return $this;
    }

    public function getSaisie(): ?string
    {
        return $this->saisie;
    }

    public function setSaisie(string $saisie): self
    {
        $this->saisie = $saisie;

        return $this;
    }

    public function getACompteIs(): ?string
    {
        return $this->aCompteIs;
    }

    public function setACompteIs(string $aCompteIs): self
    {
        $this->aCompteIs = $aCompteIs;

        return $this;
    }

    public function getBilan(): ?string
    {
        return $this->bilan;
    }

    public function setBilan(string $bilan): self
    {
        $this->bilan = $bilan;

        return $this;
    }
}
