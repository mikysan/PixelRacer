<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\IdGenerator\UuidGenerator;

#[ApiResource(mercure: true)]
#[ORM\Entity]
class Track
{
    /**
     * The entity ID
     */
    #[ORM\Id]
    #[ORM\Column(type: 'uuid', unique: true)]
    #[ORM\GeneratedValue(strategy: 'CUSTOM')]
    #[ORM\CustomIdGenerator(class: UuidGenerator::class)]
    private ?string $uuid = null;

    /**
     * The name of the track
     */
    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank]
    private string $name = '';

    /**
     * The track pieces
     */
    #[ORM\Column(type: 'json')]
    #[Assert\NotBlank]
    private array $trackPieces = [];

    public function getUuid(): ?string
    {
        return $this->uuid;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getTrackPieces(): array
    {
        return $this->trackPieces;
    }

    public function setTrackPieces(array $trackPieces): self
    {
        $this->trackPieces = $trackPieces;

        return $this;
    }
}