<?php

namespace App\Entity;

use App\Repository\CompanyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CompanyRepository::class)]
class Company
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $name = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $logo = null;

    #[ORM\ManyToMany(targetEntity: place::class, inversedBy: 'companies')]
    private Collection $place_id;

    #[ORM\OneToMany(targetEntity: Activity::class, mappedBy: 'society_id')]
    private Collection $activities;

    #[ORM\OneToMany(targetEntity: Production::class, mappedBy: 'company_id')]
    private Collection $productions;

    public function __construct()
    {
        $this->place_id = new ArrayCollection();
        $this->activities = new ArrayCollection();
        $this->productions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getLogo(): ?string
    {
        return $this->logo;
    }

    public function setLogo(?string $logo): static
    {
        $this->logo = $logo;

        return $this;
    }

    /**
     * @return Collection<int, place>
     */
    public function getPlaceId(): Collection
    {
        return $this->place_id;
    }

    public function addPlaceId(place $placeId): static
    {
        if (!$this->place_id->contains($placeId)) {
            $this->place_id->add($placeId);
        }

        return $this;
    }

    public function removePlaceId(place $placeId): static
    {
        $this->place_id->removeElement($placeId);

        return $this;
    }

    /**
     * @return Collection<int, Activity>
     */
    public function getActivities(): Collection
    {
        return $this->activities;
    }

    public function addActivity(Activity $activity): static
    {
        if (!$this->activities->contains($activity)) {
            $this->activities->add($activity);
            $activity->setSocietyId($this);
        }

        return $this;
    }

    public function removeActivity(Activity $activity): static
    {
        if ($this->activities->removeElement($activity)) {
            // set the owning side to null (unless already changed)
            if ($activity->getSocietyId() === $this) {
                $activity->setSocietyId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Production>
     */
    public function getProductions(): Collection
    {
        return $this->productions;
    }

    public function addProduction(Production $production): static
    {
        if (!$this->productions->contains($production)) {
            $this->productions->add($production);
            $production->setCompanyId($this);
        }

        return $this;
    }

    public function removeProduction(Production $production): static
    {
        if ($this->productions->removeElement($production)) {
            // set the owning side to null (unless already changed)
            if ($production->getCompanyId() === $this) {
                $production->setCompanyId(null);
            }
        }

        return $this;
    }
}
