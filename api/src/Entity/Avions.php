<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\AvionsRepository")
 */
class Avions
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string $type
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $type;

    /**
     * @var integer $nombrePlaces
     * @ORM\Column(type="integer")
     * @Assert\NotBlank
     */
    private $nombrePlaces;

    /**
     * @var Compagnies $compagnie
     * @ORM\ManyToOne(targetEntity="App\Entity\Compagnies")
     * @ORM\JoinColumn(nullable=false)
     * @Assert\NotBlank
     */
    private $compagnie;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getNombrePlaces(): ?int
    {
        return $this->nombrePlaces;
    }

    public function setNombrePlaces(int $nombrePlaces): self
    {
        $this->nombrePlaces = $nombrePlaces;

        return $this;
    }

    public function getCompagnie(): ?Compagnies
    {
        return $this->compagnie;
    }

    public function setCompagnie(?Compagnies $compagnie): self
    {
        $this->compagnie = $compagnie;

        return $this;
    }
}
