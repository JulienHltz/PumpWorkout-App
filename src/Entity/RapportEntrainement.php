<?php

namespace App\Entity;

use App\Repository\RapportEntrainementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RapportEntrainementRepository::class)]
class RapportEntrainement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dureeEntrainement = null;

    #[ORM\Column]
    private ?int $autoNotationGlobale = null;

    #[ORM\Column]
    private ?float $tonnageTotal = null;

    #[ORM\OneToMany(mappedBy: 'rapportFinal', targetEntity: RapportExercice::class)]
    private Collection $rapportExercices;

    public function __construct()
    {
        $this->rapportExercices = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getDureeEntrainement(): ?\DateTimeInterface
    {
        return $this->dureeEntrainement;
    }

    public function setDureeEntrainement(?\DateTimeInterface $dureeEntrainement): self
    {
        $this->dureeEntrainement = $dureeEntrainement;

        return $this;
    }

    public function getAutoNotationGlobale(): ?int
    {
        return $this->autoNotationGlobale;
    }

    public function setAutoNotationGlobale(int $autoNotationGlobale): self
    {
        $this->autoNotationGlobale = $autoNotationGlobale;

        return $this;
    }

    public function getTonnageTotal(): ?float
    {
        return $this->tonnageTotal;
    }

    public function setTonnageTotal(float $tonnageTotal): self
    {
        $this->tonnageTotal = $tonnageTotal;

        return $this;
    }

    /**
     * @return Collection<int, RapportExercice>
     */
    public function getRapportExercices(): Collection
    {
        return $this->rapportExercices;
    }

    public function addRapportExercice(RapportExercice $rapportExercice): self
    {
        if (!$this->rapportExercices->contains($rapportExercice)) {
            $this->rapportExercices->add($rapportExercice);
            $rapportExercice->setRapportFinal($this);
        }

        return $this;
    }

    public function removeRapportExercice(RapportExercice $rapportExercice): self
    {
        if ($this->rapportExercices->removeElement($rapportExercice)) {
            // set the owning side to null (unless already changed)
            if ($rapportExercice->getRapportFinal() === $this) {
                $rapportExercice->setRapportFinal(null);
            }
        }

        return $this;
    }
}
