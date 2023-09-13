<?php

namespace App\Entity;

use App\Repository\ForfaitRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ForfaitRepository::class)]
class Forfait
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom_forfait = null;

    #[ORM\Column]
    private ?float $prix = null;

    #[ORM\ManyToMany(targetEntity: Module::class, inversedBy: 'forfaits')]
    private Collection $module;

    #[ORM\OneToMany(mappedBy: 'forfait', targetEntity: Transaction::class)]
    private Collection $transaction;

    public function __construct()
    {
        $this->module = new ArrayCollection();
        $this->transaction = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomForfait(): ?string
    {
        return $this->nom_forfait;
    }

    public function setNomForfait(string $nom_forfait): static
    {
        $this->nom_forfait = $nom_forfait;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): static
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * @return Collection<int, Module>
     */
    public function getModule(): Collection
    {
        return $this->module;
    }

    public function addModule(Module $module): static
    {
        if (!$this->module->contains($module)) {
            $this->module->add($module);
        }

        return $this;
    }

    public function removeModule(Module $module): static
    {
        $this->module->removeElement($module);

        return $this;
    }

    /**
     * @return Collection<int, Transaction>
     */
    public function getTransaction(): Collection
    {
        return $this->transaction;
    }

    public function addTransaction(Transaction $transaction): static
    {
        if (!$this->transaction->contains($transaction)) {
            $this->transaction->add($transaction);
            $transaction->setForfait($this);
        }

        return $this;
    }

    public function removeTransaction(Transaction $transaction): static
    {
        if ($this->transaction->removeElement($transaction)) {
            // set the owning side to null (unless already changed)
            if ($transaction->getForfait() === $this) {
                $transaction->setForfait(null);
            }
        }

        return $this;
    }
}
