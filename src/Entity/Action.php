<?php

namespace App\Entity;

use App\Repository\ActionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ActionRepository::class)]
class Action
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $label = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $module = null;

    #[ORM\ManyToMany(targetEntity: activity::class, inversedBy: 'actions')]
    private Collection $activity_id;

    public function __construct()
    {
        $this->activity_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(?string $label): static
    {
        $this->label = $label;

        return $this;
    }

    public function getModule(): ?string
    {
        return $this->module;
    }

    public function setModule(?string $module): static
    {
        $this->module = $module;

        return $this;
    }

    /**
     * @return Collection<int, activity>
     */
    public function getActivityId(): Collection
    {
        return $this->activity_id;
    }

    public function addActivityId(activity $activityId): static
    {
        if (!$this->activity_id->contains($activityId)) {
            $this->activity_id->add($activityId);
        }

        return $this;
    }

    public function removeActivityId(activity $activityId): static
    {
        $this->activity_id->removeElement($activityId);

        return $this;
    }
}
