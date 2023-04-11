<?php

namespace App\Entity;

use App\Repository\RapportExerciceRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RapportExerciceRepository::class)]
class RapportExercice
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
    private ?int $nbReps = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $tmpRepos = null;

    #[ORM\Column(length: 255)]
    private ?string $vitesseExecution = null;

    #[ORM\Column]
    private ?int $autoNotation = null;

    #[ORM\Column(nullable: true)]
    private ?float $tonnageExercice = null;

    #[ORM\ManyToOne(inversedBy: 'rapportExercices')]
    #[ORM\JoinColumn(nullable: false)]
    private ?RapportEntrainement $rapportFinal = null;

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

    public function getNbReps(): ?int
    {
        return $this->nbReps;
    }

    public function setNbReps(int $nbReps): self
    {
        $this->nbReps = $nbReps;

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

    public function getAutoNotation(): ?int
    {
        return $this->autoNotation;
    }

    public function setAutoNotation(int $autoNotation): self
    {
        $this->autoNotation = $autoNotation;

        return $this;
    }

    public function getTonnageExercice(): ?float
    {
        return $this->tonnageExercice;
    }

    public function setTonnageExercice(?float $tonnageExercice): self
    {
        $this->tonnageExercice = $tonnageExercice;

        return $this;
    }

    public function getRapportFinal(): ?RapportEntrainement
    {
        return $this->rapportFinal;
    }

    public function setRapportFinal(?RapportEntrainement $rapportFinal): self
    {
        $this->rapportFinal = $rapportFinal;

        return $this;
    }
}
