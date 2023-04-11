<?php

namespace App\Entity;

use App\Repository\EntrainementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EntrainementRepository::class)]
class Entrainement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $tags = null;

    #[ORM\Column]
    private ?bool $visible = null;

    #[ORM\ManyToMany(targetEntity: Exercice::class, inversedBy: 'entrainements')]
    private Collection $exercices;

    #[ORM\ManyToMany(targetEntity: Carnet::class, mappedBy: 'entrainements')]
    private Collection $carnets;

    public function __construct()
    {
        $this->exercices = new ArrayCollection();
        $this->carnets = new ArrayCollection();
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

    public function getTags(): ?string
    {
        return $this->tags;
    }

    public function setTags(?string $tags): self
    {
        $this->tags = $tags;

        return $this;
    }

    public function isVisible(): ?bool
    {
        return $this->visible;
    }

    public function setVisible(bool $visible): self
    {
        $this->visible = $visible;

        return $this;
    }

    /**
     * @return Collection<int, Exercice>
     */
    public function getExercices(): Collection
    {
        return $this->exercices;
    }

    public function addExercice(Exercice $exercice): self
    {
        if (!$this->exercices->contains($exercice)) {
            $this->exercices->add($exercice);
        }

        return $this;
    }

    public function removeExercice(Exercice $exercice): self
    {
        $this->exercices->removeElement($exercice);

        return $this;
    }

    /**
     * @return Collection<int, Carnet>
     */
    public function getCarnets(): Collection
    {
        return $this->carnets;
    }

    public function addCarnet(Carnet $carnet): self
    {
        if (!$this->carnets->contains($carnet)) {
            $this->carnets->add($carnet);
            $carnet->addEntrainement($this);
        }

        return $this;
    }

    public function removeCarnet(Carnet $carnet): self
    {
        if ($this->carnets->removeElement($carnet)) {
            $carnet->removeEntrainement($this);
        }

        return $this;
    }
}
