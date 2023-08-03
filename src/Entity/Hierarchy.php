<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\HierarchyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HierarchyRepository::class)]
#[ApiResource]
class Hierarchy
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $relation = null;

    #[ORM\ManyToMany(targetEntity: Team::class, inversedBy: 'relations')]
    private Collection $relations;

    public function __construct()
    {
        $this->relations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRelation(): ?string
    {
        return $this->relation;
    }

    public function setRelation(string $relation): static
    {
        $this->relation = $relation;

        return $this;
    }

    /**
     * @return Collection<int, Team>
     */
    public function getRelations(): Collection
    {
        return $this->relations;
    }

    public function addRelation(Team $relation): static
    {
        if (!$this->relations->contains($relation)) {
            $this->relations->add($relation);
        }

        return $this;
    }

    public function removeRelation(Team $relation): static
    {
        $this->relations->removeElement($relation);

        return $this;
    }
}
