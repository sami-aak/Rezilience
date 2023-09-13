<?php

namespace App\Entity;

use App\Repository\ModuleRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ModuleRepository::class)]
class Module
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom_module = null;

    #[ORM\Column(length: 255)]
    private ?string $description_module = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomModule(): ?string
    {
        return $this->nom_module;
    }

    public function setNomModule(string $nom_module): static
    {
        $this->nom_module = $nom_module;

        return $this;
    }

    public function getDescriptionModule(): ?string
    {
        return $this->description_module;
    }

    public function setDescriptionModule(string $description_module): static
    {
        $this->description_module = $description_module;

        return $this;
    }
}
