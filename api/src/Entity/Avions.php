<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AvionsRepository")
 * @ApiResource(
 *     attributes={"access_control"="is_granted('ROLE_USER')"},
 *     normalizationContext={"groups"={"avions_read"}},
 *     denormalizationContext={"groups"={"avions_write"}},
 *     collectionOperations={
 *          "get",
 *          "post"={"access_control"="is_granted('ROLE_ADMIN')", "access_control_message"="Seul les admins peuvent ajouter des avions."}
 *     },
 *     itemOperations={
 *          "get",
 *          "put"={"access_control"="is_granted('ROLE_ADMIN')",  "access_control_message"="Seul les admins peuvent modifier des avions."},
 *          "delete"={"access_control"="is_granted('ROLE_ADMIN')",  "access_control_message"="Seul les admins peuvent supprimer des avions."}
 *     }
 * )
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
     * @Groups({"avions_read", "avions_write"})
     */
    private $type;

    /**
     * @var integer $nombrePlaces
     * @ORM\Column(type="integer")
     * @Assert\NotBlank
     * @Groups({"avions_read", "avions_write"})
     */
    private $nombrePlaces;

    /**
     * @var Compagnies $compagnie
     * @ORM\ManyToOne(targetEntity="App\Entity\Compagnies")
     * @ORM\JoinColumn(nullable=false)
     * @Assert\NotBlank
     * @Groups({"avions_read", "avions_write"})
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
