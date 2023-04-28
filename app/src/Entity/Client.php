<?php

namespace App\Entity;

use App\Repository\ClientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClientRepository::class)]
class Client
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;



    #[ORM\Column(length: 255)]
    private ?string $societe = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom = null;

    #[ORM\Column(length: 255)]
    private ?string $adresse = null;

    #[ORM\Column(length: 255)]
    private ?string $codePostal = null;

    #[ORM\Column(length: 255)]
    private ?string $ville = null;

    #[ORM\Column(length: 255)]
    private ?string $pays = null;

    #[ORM\Column(length: 255)]
    private ?string $telMobile = null;

    #[ORM\Column(length: 255)]
    private ?string $telBureau = null;

    #[ORM\Column(length: 255)]
    private ?string $fax = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $siteWeb = null;

    #[ORM\Column(length: 255)]
    private ?string $nomSociete = null;


    #[ORM\Column(length: 255)]
    private ?string $rc = null;

    #[ORM\Column(length: 255)]
    private ?string $capital = null;

    #[ORM\Column(length: 255)]
    private ?string $cnss = null;

    #[ORM\Column(length: 255)]
    private ?string $patente = null;

    #[ORM\Column(length: 255)]
    private ?string $identicicationFiscale = null;

    #[ORM\Column(length: 255)]
    private ?string $ice = null;

    #[ORM\ManyToOne(inversedBy: 'clients')]
    private ?Categorie $Categorie = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $type = null;

    #[ORM\OneToMany(mappedBy: 'client', targetEntity: Contrat::class)]
    private Collection $Client;

    #[ORM\ManyToOne(inversedBy: 'client')]
    private ?User $user = null;


    public function __construct()
    {
        $this->types = new ArrayCollection();
        $this->Client = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }







    public function getSociete(): ?string
    {
        return $this->societe;
    }

    public function setSociete(string $societe): self
    {
        $this->societe = $societe;

        return $this;
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

    public function getCodePostal(): ?string
    {
        return $this->codePostal;
    }

    public function setCodePostal(string $codePostal): self
    {
        $this->codePostal = $codePostal;

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

    public function getIdenticicationFiscale(): ?string
    {
        return $this->identicicationFiscale;
    }

    public function setIdenticicationFiscale(string $identicicationFiscale): self
    {
        $this->identicicationFiscale = $identicicationFiscale;

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

    public function getCategorie(): ?Categorie
    {
        return $this->Categorie;
    }

    public function setCategorie(?Categorie $Categorie): self
    {
        $this->Categorie = $Categorie;

        return $this;
    }

    public function __toString()
    {
        return $this ->nom;
    }



    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getContrat(): ?contrat
    {
        return $this->Contrat;
    }

    public function setContrat(?contrat $Contrat): self
    {
        $this->Contrat = $Contrat;

        return $this;
    }

    /**
     * @return Collection<int, Contrat>
     */
    public function getClient(): Collection
    {
        return $this->Client;
    }

    public function addClient(Contrat $client): self
    {
        if (!$this->Client->contains($client)) {
            $this->Client->add($client);
            $client->setClient($this);
        }

        return $this;
    }

    public function removeClient(Contrat $client): self
    {
        if ($this->Client->removeElement($client)) {
            // set the owning side to null (unless already changed)
            if ($client->getClient() === $this) {
                $client->setClient(null);
            }
        }

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
}