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

    #[ORM\Column(length: 255)]
    private ?string $designation = null;

    #[ORM\Column(nullable: true)]
    private ?string $duree = null;

    #[ORM\Column]
    private ?bool $direct = null;

  /*  #[ORM\OneToMany(mappedBy: 'periodicite', targetEntity: tache::class)]
    private Collection $tache;

    public function __construct()
    {
        $this->tache = new ArrayCollection();
    }
*/
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDesignation(): ?string
    {
        return $this->designation;
    }

    public function setDesignation(string $designation): self
    {
        $this->designation = $designation;

        return $this;
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

    public function isDirect(): ?bool
    {
        return $this->direct;
    }

    public function setDirect(bool $direct): self
    {
        $this->direct = $direct;

        return $this;
    }





    /**
     * @ORM\ManyToOne(targetEntity=Tache::class)
     * @ORM\JoinColumn(nullable=false)
     */
    protected $Tache;

    #[ORM\OneToMany(mappedBy: 'Periodicite', targetEntity: Tache::class)]
    private Collection $taches;

    public function __construct()
    {
        $this->taches = new ArrayCollection();
    }
    public function getTache(): ?Tache
    {
        return $this->Tache;
    }

    /**
     * @return Collection<int, Tache>
     */
    public function getTaches(): Collection
    {
        return $this->taches;
    }

    public function addTach(Tache $tach): self
    {
        if (!$this->taches->contains($tach)) {
            $this->taches->add($tach);
            $tach->setPeriodicite($this);
        }

        return $this;
    }

    public function removeTach(Tache $tach): self
    {
        if ($this->taches->removeElement($tach)) {
            // set the owning side to null (unless already changed)
            if ($tach->getPeriodicite() === $this) {
                $tach->setPeriodicite(null);
            }
        }

        return $this;
    }

}
