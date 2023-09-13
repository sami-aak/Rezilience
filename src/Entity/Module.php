<?php

namespace App\Entity;

use App\Repository\ModuleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    #[ORM\ManyToOne(inversedBy: 'modules')]
    private ?Formation $formation = null;

    #[ORM\OneToMany(mappedBy: 'module', targetEntity: Contenu::class)]
    private Collection $contenus;

    #[ORM\ManyToMany(targetEntity: Forfait::class, mappedBy: 'module')]
    private Collection $forfaits;

    #[ORM\ManyToMany(targetEntity: User::class, mappedBy: 'module')]
    private Collection $users;

    public function __construct()
    {
        $this->contenus = new ArrayCollection();
        $this->forfaits = new ArrayCollection();
        $this->users = new ArrayCollection();
    }

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

    public function getFormation(): ?Formation
    {
        return $this->formation;
    }

    public function setFormation(?Formation $formation): static
    {
        $this->formation = $formation;

        return $this;
    }

    /**
     * @return Collection<int, Contenu>
     */
    public function getContenus(): Collection
    {
        return $this->contenus;
    }

    public function addContenu(Contenu $contenu): static
    {
        if (!$this->contenus->contains($contenu)) {
            $this->contenus->add($contenu);
            $contenu->setModule($this);
        }

        return $this;
    }

    public function removeContenu(Contenu $contenu): static
    {
        if ($this->contenus->removeElement($contenu)) {
            // set the owning side to null (unless already changed)
            if ($contenu->getModule() === $this) {
                $contenu->setModule(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Forfait>
     */
    public function getForfaits(): Collection
    {
        return $this->forfaits;
    }

    public function addForfait(Forfait $forfait): static
    {
        if (!$this->forfaits->contains($forfait)) {
            $this->forfaits->add($forfait);
            $forfait->addModule($this);
        }

        return $this;
    }

    public function removeForfait(Forfait $forfait): static
    {
        if ($this->forfaits->removeElement($forfait)) {
            $forfait->removeModule($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): static
    {
        if (!$this->users->contains($user)) {
            $this->users->add($user);
            $user->addModule($this);
        }

        return $this;
    }

    public function removeUser(User $user): static
    {
        if ($this->users->removeElement($user)) {
            $user->removeModule($this);
        }

        return $this;
    }
}
