<?php

namespace App\Entity;

use App\Repository\FormationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FormationRepository::class)]
class Formation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom_formation = null;

    #[ORM\Column(length: 255)]
    private ?string $description_formation = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomFormation(): ?string
    {
        return $this->nom_formation;
    }

    public function setNomFormation(string $nom_formation): static
    {
        $this->nom_formation = $nom_formation;

        return $this;
    }

    public function getDescriptionFormation(): ?string
    {
        return $this->description_formation;
    }

    public function setDescriptionFormation(string $description_formation): static
    {
        $this->description_formation = $description_formation;

        return $this;
    }
}
