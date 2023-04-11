<?php

namespace App\Entity;

use App\Repository\ClientRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClientRepository::class)]
class Client
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $nom = null;

    #[ORM\Column(length: 50)]
    private ?string $prenom = null;

    #[ORM\Column(length: 255)]
    private ?string $adresse = null;

    #[ORM\Column]
    private ?int $code_postale = null;

    #[ORM\Column(length: 10)]
    private ?string $ville = null;

    #[ORM\Column(length: 10)]
    private ?string $pays = null;

    #[ORM\Column]
    private ?int $telMobile = null;

    #[ORM\Column]
    private ?int $telBureau = null;

    #[ORM\Column]
    private ?int $fax = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $siteWeb = null;

    #[ORM\Column(length: 255)]
    private ?string $nomSocieté = null;

    #[ORM\Column(length: 50)]
    private ?string $rC = null;

    #[ORM\Column(length: 20)]
    private ?string $capital = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $cnss = null;

    #[ORM\Column(length: 20)]
    private ?string $patente = null;

    #[ORM\Column]
    private ?int $identificatinFiscale = null;

    #[ORM\Column]
    private ?int $ice = null;

    #[ORM\Column(length: 255)]
    private ?string $compteBancaire = null;

    #[ORM\Column(length: 255)]
    private ?string $agenceBancaire = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $exercice = null;

    #[ORM\Column(length: 255)]
    private ?string $type = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getCodePostale(): ?int
    {
        return $this->code_postale;
    }

    public function setCodePostale(int $code_postale): self
    {
        $this->code_postale = $code_postale;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getPays(): ?string
    {
        return $this->pays;
    }

    public function setPays(string $pays): self
    {
        $this->pays = $pays;

        return $this;
    }

    public function getTelMobile(): ?int
    {
        return $this->telMobile;
    }

    public function setTelMobile(int $telMobile): self
    {
        $this->telMobile = $telMobile;

        return $this;
    }

    public function getTelBureau(): ?int
    {
        return $this->telBureau;
    }

    public function setTelBureau(int $telBureau): self
    {
        $this->telBureau = $telBureau;

        return $this;
    }

    public function getFax(): ?int
    {
        return $this->fax;
    }

    public function setFax(int $fax): self
    {
        $this->fax = $fax;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getSiteWeb(): ?string
    {
        return $this->siteWeb;
    }

    public function setSiteWeb(string $siteWeb): self
    {
        $this->siteWeb = $siteWeb;

        return $this;
    }

    public function getNomSocieté(): ?string
    {
        return $this->nomSocieté;
    }

    public function setNomSocieté(string $nomSocieté): self
    {
        $this->nomSocieté = $nomSocieté;

        return $this;
    }

    public function getRC(): ?string
    {
        return $this->rC;
    }

    public function setRC(string $rC): self
    {
        $this->rC = $rC;

        return $this;
    }

    public function getCapital(): ?string
    {
        return $this->capital;
    }

    public function setCapital(string $capital): self
    {
        $this->capital = $capital;

        return $this;
    }

    public function getCnss(): ?string
    {
        return $this->cnss;
    }

    public function setCnss(?string $cnss): self
    {
        $this->cnss = $cnss;

        return $this;
    }

    public function getPatente(): ?string
    {
        return $this->patente;
    }

    public function setPatente(string $patente): self
    {
        $this->patente = $patente;

        return $this;
    }

    public function getIdentificatinFiscale(): ?int
    {
        return $this->identificatinFiscale;
    }

    public function setIdentificatinFiscale(int $identificatinFiscale): self
    {
        $this->identificatinFiscale = $identificatinFiscale;

        return $this;
    }

    public function getIce(): ?int
    {
        return $this->ice;
    }

    public function setIce(int $ice): self
    {
        $this->ice = $ice;

        return $this;
    }

    public function getCompteBancaire(): ?string
    {
        return $this->compteBancaire;
    }

    public function setCompteBancaire(string $compteBancaire): self
    {
        $this->compteBancaire = $compteBancaire;

        return $this;
    }

    public function getAgenceBancaire(): ?string
    {
        return $this->agenceBancaire;
    }

    public function setAgenceBancaire(string $agenceBancaire): self
    {
        $this->agenceBancaire = $agenceBancaire;

        return $this;
    }

    public function getExercice(): ?\DateTimeInterface
    {
        return $this->exercice;
    }

    public function setExercice(\DateTimeInterface $exercice): self
    {
        $this->exercice = $exercice;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }
}
