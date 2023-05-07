<?php

namespace App\Entity;

use App\Repository\TaskRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TaskRepository::class)]
class Task
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateDebut = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateFin = null;

    #[ORM\Column(type: Types::ARRAY)]
    private array $status = [];

    #[ORM\ManyToOne(inversedBy: 'tasks')]
    private ?User $User = null;

    #[ORM\OneToMany(mappedBy: 'Task', targetEntity: Typetache::class)]
    private Collection $typetaches;

    public function __construct()
    {
        $this->typetaches = new ArrayCollection();
    }






    public function getId(): ?int
    {
        return $this->id;
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

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->dateFin;
    }

    public function setDateFin(\DateTimeInterface $dateFin): self
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    public function getStatus(): array
    {
        return $this->status;
    }

    public function setStatus(array $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->User;
    }

    public function setUser(?User $User): self
    {
        $this->User = $User;

        return $this;
    }

    /**
     * @return Collection<int, Typetache>
     */
    public function getTypetaches(): Collection
    {
        return $this->typetaches;
    }

    public function addTypetach(Typetache $typetach): self
    {
        if (!$this->typetaches->contains($typetach)) {
            $this->typetaches->add($typetach);
            $typetach->setTask($this);
        }

        return $this;
    }

    public function removeTypetach(Typetache $typetach): self
    {
        if ($this->typetaches->removeElement($typetach)) {
            // set the owning side to null (unless already changed)
            if ($typetach->getTask() === $this) {
                $typetach->setTask(null);
            }
        }

        return $this;
    }

    public function settacheType(mixed $tacheType)
    {
        return $tacheType;
    }


}
