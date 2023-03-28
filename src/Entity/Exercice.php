<?php

namespace App\Entity;

use App\Repository\ExerciceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExerciceRepository::class)]
class Exercice
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(nullable: true)]
    private ?float $poids = null;

    #[ORM\Column]
    private ?int $nbRep = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $tmpRepos = null;

    #[ORM\Column(length: 255)]
    private ?string $vitesseExecution = null;

    #[ORM\ManyToMany(targetEntity: Entrainement::class, mappedBy: 'exercices')]
    private Collection $entrainements;

    public function __construct()
    {
        $this->entrainements = new ArrayCollection();
    }

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

    public function getPoids(): ?float
    {
        return $this->poids;
    }

    public function setPoids(?float $poids): self
    {
        $this->poids = $poids;

        return $this;
    }

    public function getNbRep(): ?int
    {
        return $this->nbRep;
    }

    public function setNbRep(int $nbRep): self
    {
        $this->nbRep = $nbRep;

        return $this;
    }

    public function getTmpRepos(): ?\DateTimeInterface
    {
        return $this->tmpRepos;
    }

    public function setTmpRepos(\DateTimeInterface $tmpRepos): self
    {
        $this->tmpRepos = $tmpRepos;

        return $this;
    }

    public function getVitesseExecution(): ?string
    {
        return $this->vitesseExecution;
    }

    public function setVitesseExecution(string $vitesseExecution): self
    {
        $this->vitesseExecution = $vitesseExecution;

        return $this;
    }

    /**
     * @return Collection<int, Entrainement>
     */
    public function getEntrainements(): Collection
    {
        return $this->entrainements;
    }

    public function addEntrainement(Entrainement $entrainement): self
    {
        if (!$this->entrainements->contains($entrainement)) {
            $this->entrainements->add($entrainement);
            $entrainement->addExercice($this);
        }

        return $this;
    }

    public function removeEntrainement(Entrainement $entrainement): self
    {
        if ($this->entrainements->removeElement($entrainement)) {
            $entrainement->removeExercice($this);
        }

        return $this;
    }
}
