<?php

namespace App\Entity;

use App\Repository\ClientsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClientsRepository::class)]
class Clients
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 50)]
    private ?string $prenom = null;

    #[ORM\Column(length: 50)]
    private ?string $adresse = null;

    #[ORM\Column(length: 50)]
    private ?string $ville = null;

    #[ORM\Column(length: 50)]
    private ?string $codePostal = null;

    #[ORM\Column(length: 50)]
    private ?string $pays = null;

    #[ORM\Column(length: 50)]
    private ?string $telMobile = null;

    #[ORM\Column(length: 50)]
    private ?string $telBureau = null;

    #[ORM\Column(length: 50)]
    private ?string $fax = null;

    #[ORM\Column(length: 50)]
    private ?string $email = null;

    #[ORM\Column(length: 50)]
    private ?string $siteWeb = null;

    #[ORM\Column(length: 255)]
    private ?string $type = null;

    #[ORM\Column(length: 255)]
    private ?string $nomSociete = null;

    #[ORM\Column(length: 255)]
    private ?string $rc = null;

    #[ORM\Column(length: 50)]
    private ?string $capital = null;

    #[ORM\Column(length: 50)]
    private ?string $cnss = null;

    #[ORM\Column(length: 50)]
    private ?string $patente = null;

    #[ORM\Column(length: 50)]
    private ?string $ice = null;

    #[ORM\Column(length: 50)]
    private ?string $comptesBancaire = null;

    #[ORM\Column(length: 50)]
    private ?string $identificationFiscale = null;

    #[ORM\Column(length: 50)]
    private ?string $agenceBancaire = null;

    #[ORM\Column(length: 50)]
    private ?string $exercice = null;

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

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getCodePostal(): ?string
    {
        return $this->codePostal;
    }

    public function setCodePostal(string $codePostal): self
    {
        $this->codePostal = $codePostal;

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

    public function getTelMobile(): ?string
    {
        return $this->telMobile;
    }

    public function setTelMobile(string $telMobile): self
    {
        $this->telMobile = $telMobile;

        return $this;
    }

    public function getTelBureau(): ?string
    {
        return $this->telBureau;
    }

    public function setTelBureau(string $telBureau): self
    {
        $this->telBureau = $telBureau;

        return $this;
    }

    public function getFax(): ?string
    {
        return $this->fax;
    }

    public function setFax(string $fax): self
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

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getNomSociete(): ?string
    {
        return $this->nomSociete;
    }

    public function setNomSociete(string $nomSociete): self
    {
        $this->nomSociete = $nomSociete;

        return $this;
    }

    public function getRc(): ?string
    {
        return $this->rc;
    }

    public function setRc(string $rc): self
    {
        $this->rc = $rc;

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

    public function setCnss(string $cnss): self
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

    public function getIce(): ?string
    {
        return $this->ice;
    }

    public function setIce(string $ice): self
    {
        $this->ice = $ice;

        return $this;
    }

    public function getComptesBancaire(): ?string
    {
        return $this->comptesBancaire;
    }

    public function setComptesBancaire(string $comptesBancaire): self
    {
        $this->comptesBancaire = $comptesBancaire;

        return $this;
    }

    public function getIdentificationFiscale(): ?string
    {
        return $this->identificationFiscale;
    }

    public function setIdentificationFiscale(string $identificationFiscale): self
    {
        $this->identificationFiscale = $identificationFiscale;

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

    public function getExercice(): ?string
    {
        return $this->exercice;
    }

    public function setExercice(string $exercice): self
    {
        $this->exercice = $exercice;

        return $this;
    }
}
