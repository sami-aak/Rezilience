<?php

namespace App\Entity;

use App\Repository\ContenuRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ContenuRepository::class)]
class Contenu
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom_fichier = null;

    #[ORM\Column(length: 255)]
    private ?string $type_fichier = null;

    #[ORM\Column(length: 255)]
    private ?string $lien_fichier = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomFichier(): ?string
    {
        return $this->nom_fichier;
    }

    public function setNomFichier(string $nom_fichier): static
    {
        $this->nom_fichier = $nom_fichier;

        return $this;
    }

    public function getTypeFichier(): ?string
    {
        return $this->type_fichier;
    }

    public function setTypeFichier(string $type_fichier): static
    {
        $this->type_fichier = $type_fichier;

        return $this;
    }

    public function getLienFichier(): ?string
    {
        return $this->lien_fichier;
    }

    public function setLienFichier(string $lien_fichier): static
    {
        $this->lien_fichier = $lien_fichier;

        return $this;
    }
}
