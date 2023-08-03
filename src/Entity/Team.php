<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\TeamRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TeamRepository::class)]
#[ApiResource]
class Team
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $firstname = null;

    #[ORM\Column(length: 255)]
    private ?string $lastname = null;

    #[ORM\ManyToMany(targetEntity: Position::class, mappedBy: 'users')]
    private Collection $positions;

    #[ORM\Column(length: 255)]
    private ?string $age = null;

    #[ORM\Column(length: 255)]
    private ?string $adresse = null;

    #[ORM\Column(length: 255)]
    private ?string $tel = null;

    #[ORM\Column(length: 255)]
    private ?string $mail = null;

    #[ORM\Column(length: 255)]
    private ?string $photo = null;

    #[ORM\Column(length: 255)]
    private ?string $cv = null;

    #[ORM\ManyToMany(targetEntity: self::class, inversedBy: 'child')]
    private Collection $child;

    #[ORM\ManyToMany(targetEntity: Hierarchy::class, mappedBy: 'relations')]
    private Collection $relations;

    #[ORM\Column(length: 255)]
    private ?string $superieur = null;

    public function __construct()
    {
        $this->positions = new ArrayCollection();
        $this->child = new ArrayCollection();
        $this->relations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): static
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): static
    {
        $this->lastname = $lastname;

        return $this;
    }

    // liaison de la table team à la table position
    /**
     * @return Collection<int, Position>
     */
    public function getPositions(): Collection
    {
        return $this->positions;
    }

    public function addPosition(Position $position): static
    {
        if (!$this->positions->contains($position)) {
            $this->positions->add($position);
            $position->addUser($this);
        }

        return $this;
    }

    public function removePosition(Position $position): static
    {
        if ($this->positions->removeElement($position)) {
            $position->removeUser($this);
        }

        return $this;
    }

    public function getage(): ?string
    {
        return $this->age;
    }

    public function setage(string $age): static
    {
        $this->age = $age;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): static
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getTel(): ?string
    {
        return $this->tel;
    }

    public function setTel(string $tel): static
    {
        $this->tel = $tel;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): static
    {
        $this->mail = $mail;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(string $photo): static
    {
        $this->photo = $photo;

        return $this;
    }

    public function getCv(): ?string
    {
        return $this->cv;
    }

    public function setCv(string $cv): static
    {
        $this->cv = $cv;

        return $this;
    }

    public function getSuperieur(): ?int
    {
        return $this->superieur;
    }

    public function setSuperieur(?int $superieur): static
    {
        $this->superieur = $superieur;

        return $this;
    }

    public function getChildren() {
        

        return $this->children;
    }

    // liaison sur la table team afin de créer une relation parent-enfant entre les différentes valeurs
    /**
     * @return Collection<int, self>
     */
    public function getChild(): Collection
    {
        return $this->child;
    }

    public function addChild(self $child): static
    {
        if (!$this->child->contains($child)) {
            $this->child->add($child);
        }

        return $this;
    }

    public function removeChild(self $child): static
    {
        $this->child->removeElement($child);

        return $this;
    }
}