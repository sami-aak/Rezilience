<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180, unique: true)]
    private ?string $email = null;

    #[ORM\Column]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_de_naissance = null;

    #[ORM\Column(length: 255)]
    private ?string $domaine_activite = null;

    #[ORM\Column]
    private ?int $exp_pro = null;

    #[ORM\Column(type: Types::DATETIME_IMMUTABLE)]
    private \DateTimeImmutable $date_creation;

    #[ORM\Column(type: Types::DATETIME_IMMUTABLE, nullable:true)]
    private ?\DateTimeImmutable $date_maj = null;

    #[ORM\Column(type: Types::DATETIME_IMMUTABLE, nullable:true)]
    private ?\DateTimeImmutable $date_connexion;

    #[ORM\Column(type: Types::DATE_IMMUTABLE, nullable:true)]
    private ?\DateTimeImmutable $expiration_abonnement;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: Transaction::class)]
    private Collection $transaction;

    #[ORM\ManyToMany(targetEntity: Module::class, inversedBy: 'users')]
    private Collection $module;

    public function __construct()
    {
        $this->transaction = new ArrayCollection();
        $this->module = new ArrayCollection();
        $this->date_creation = new \DateTimeImmutable();        
        $this->date_maj = new \DateTimeImmutable();        
        $this->date_connexion = new \DateTimeImmutable();       
        $this->expiration_abonnement = new \DateTimeImmutable();       
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getDateDeNaissance(): ?\DateTimeInterface
    {
        return $this->date_de_naissance;
    }

    public function setDateDeNaissance(\DateTimeInterface $date_de_naissance): static
    {
        $this->date_de_naissance = $date_de_naissance;

        return $this;
    }

    public function getDomaineActivite(): ?string
    {
        return $this->domaine_activite;
    }

    public function setDomaineActivite(string $domaine_activite): static
    {
        $this->domaine_activite = $domaine_activite;

        return $this;
    }

    public function getExpPro(): ?int
    {
        return $this->exp_pro;
    }

    public function setExpPro(int $exp_pro): static
    {
        $this->exp_pro = $exp_pro;

        return $this;
    }

    public function getDateCreation(): \DateTimeImmutable
    {
        return $this->date_creation;
    }

    public function setDateCreation(\DateTimeImmutable $date_creation): self
    {
        $this->date_creation = $date_creation;

        return $this;
    }

    public function getDateMaj(): ?\DateTimeImmutable
    {
        return $this->date_maj;
    }

    public function setDateMaj(): self
    {
        $this->date_maj = new \DateTimeImmutable;

        return $this;
    }

    public function getDateConnexion(): ?\DateTimeImmutable
    {
        return $this->date_connexion;
    }

    public function setDateConnexion(\DateTimeImmutable $date_connexion): static
    {
        $this->date_connexion = $date_connexion;

        return $this;
    }

    public function getExpirationAbonnement(): ?\DateTimeImmutable
    {
        return $this->expiration_abonnement;
    }

    public function setExpirationAbonnement(\DateTimeImmutable $expiration_abonnement): static
    {
        $this->expiration_abonnement = $expiration_abonnement;

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
            $transaction->setUser($this);
        }

        return $this;
    }

    public function removeTransaction(Transaction $transaction): static
    {
        if ($this->transaction->removeElement($transaction)) {
            // set the owning side to null (unless already changed)
            if ($transaction->getUser() === $this) {
                $transaction->setUser(null);
            }
        }

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
}
