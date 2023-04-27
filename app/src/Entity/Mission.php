<?php

namespace App\Entity;

use App\Repository\MiissionRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MiissionRepository::class)]
class Mission
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $cnss = null;

    #[ORM\Column(length: 50)]
    private ?string $salares = null;

    #[ORM\Column(length: 50)]
    private ?string $tva = null;

    #[ORM\Column(length: 50)]
    private ?string $juridique = null;

    #[ORM\Column(length: 50)]
    private ?string $cac = null;

    #[ORM\Column(length: 50)]
    private ?string $audit = null;

    #[ORM\Column(length: 50)]
    private ?string $augmentationDeCapital = null;

    #[ORM\Column(length: 50)]
    private ?string $constitution = null;

    #[ORM\Column(length: 50)]
    private ?string $transformationPp = null;

    #[ORM\Column(length: 255)]
    private ?string $cessionDesParts = null;

    #[ORM\Column(length: 255)]
    private ?string $livresCotesParaphes = null;

    #[ORM\Column(length: 255)]
    private ?string $taxesProfessionnelles = null;

    #[ORM\Column(length: 255)]
    private ?string $tenueDeComptabilite = null;

    #[ORM\Column(length: 255)]
    private ?string $controle = null;

    #[ORM\Column(length: 255)]
    private ?string $revision = null;

    #[ORM\Column(length: 255)]
    private ?string $saisie = null;

    #[ORM\Column(length: 255)]
    private ?string $acompteIs = null;

    #[ORM\Column(length: 255)]
    private ?string $bilan = null;

    #[ORM\Column(length: 255)]
    private ?string $autres = null;

    #[ORM\Column(length: 255)]
    private ?string $ir = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $designation = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCnss(): ?string
    {
        return $this->cnss;
    }

    public function setCnss(string $cnss): self
    {
        $this->cnss = $cnss;

        return $this;
    }

    public function getSalares(): ?string
    {
        return $this->salares;
    }

    public function setSalares(string $salares): self
    {
        $this->salares = $salares;

        return $this;
    }

    public function getTva(): ?string
    {
        return $this->tva;
    }

    public function setTva(string $tva): self
    {
        $this->tva = $tva;

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

    public function getCac(): ?string
    {
        return $this->cac;
    }

    public function setCac(string $cac): self
    {
        $this->cac = $cac;

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

    public function getAugmentationDeCapital(): ?string
    {
        return $this->augmentationDeCapital;
    }

    public function setAugmentationDeCapital(string $augmentationDeCapital): self
    {
        $this->augmentationDeCapital = $augmentationDeCapital;

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

    public function getTransformationPp(): ?string
    {
        return $this->transformationPp;
    }

    public function setTransformationPp(string $transformationPp): self
    {
        $this->transformationPp = $transformationPp;

        return $this;
    }

    public function getCessionDesParts(): ?string
    {
        return $this->cessionDesParts;
    }

    public function setCessionDesParts(string $cessionDesParts): self
    {
        $this->cessionDesParts = $cessionDesParts;

        return $this;
    }

    public function getLivresCotesParaphes(): ?string
    {
        return $this->livresCotesParaphes;
    }

    public function setLivresCotesParaphes(string $livresCotesParaphes): self
    {
        $this->livresCotesParaphes = $livresCotesParaphes;

        return $this;
    }

    public function getTaxesProfessionnelles(): ?string
    {
        return $this->taxesProfessionnelles;
    }

    public function setTaxesProfessionnelles(string $taxesProfessionnelles): self
    {
        $this->taxesProfessionnelles = $taxesProfessionnelles;

        return $this;
    }

    public function getTenueDeComptabilite(): ?string
    {
        return $this->tenueDeComptabilite;
    }

    public function setTenueDeComptabilite(string $tenueDeComptabilite): self
    {
        $this->tenueDeComptabilite = $tenueDeComptabilite;

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

    public function getAcompteIs(): ?string
    {
        return $this->acompteIs;
    }

    public function setAcompteIs(string $acompteIs): self
    {
        $this->acompteIs = $acompteIs;

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

    public function getAutres(): ?string
    {
        return $this->autres;
    }

    public function setAutres(string $autres): self
    {
        $this->autres = $autres;

        return $this;
    }

    public function getIr(): ?string
    {
        return $this->ir;
    }

    public function setIr(string $ir): self
    {
        $this->ir = $ir;

        return $this;
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
}
