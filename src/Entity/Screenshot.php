<?php

namespace App\Entity;

use App\Repository\ScreenshotRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ScreenshotRepository::class)]
class Screenshot
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $image = null;

    #[ORM\Column(length: 15)]
    private ?string $type = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(type: Types::SMALLINT, nullable: true)]
    private ?int $carrousel = null;

    #[ORM\Column(length: 150, nullable: true)]
    private ?string $carrousel_caption = null;

    #[ORM\ManyToOne(inversedBy: 'screenshots')]
    private ?production $production_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): static
    {
        $this->image = $image;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getCarrousel(): ?int
    {
        return $this->carrousel;
    }

    public function setCarrousel(?int $carrousel): static
    {
        $this->carrousel = $carrousel;

        return $this;
    }

    public function getCarrouselCaption(): ?string
    {
        return $this->carrousel_caption;
    }

    public function setCarrouselCaption(?string $carrousel_caption): static
    {
        $this->carrousel_caption = $carrousel_caption;

        return $this;
    }

    public function getProductionId(): ?production
    {
        return $this->production_id;
    }

    public function setProductionId(?production $production_id): static
    {
        $this->production_id = $production_id;

        return $this;
    }
}
