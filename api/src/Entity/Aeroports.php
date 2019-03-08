<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AeroportsRepository")
 * @ApiResource(
 *     attributes={"access_control"="is_granted('ROLE_USER')"},
 *     normalizationContext={"groups"={"aeroports_read"}},
 *     denormalizationContext={"groups"={"aeroports_write"}},
 *     collectionOperations={
 *          "get",
 *          "post"={"access_control"="is_granted('ROLE_ADMIN')", "access_control_message"="Seul les admins peuvent ajouter des Aeroports."}
 *     },
 *     itemOperations={
 *          "get",
 *          "put"={"access_control"="is_granted('ROLE_ADMIN')",  "access_control_message"="Seul les admins peuvent modifier des Aeroports."},
 *          "delete"={"access_control"="is_granted('ROLE_ADMIN')",  "access_control_message"="Seul les admins peuvent supprimer des Aeroports."}
 *     }
 * )
 */
class Aeroports
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string $nom
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     * @Groups({"aeroports_read", "aeroports_write"})
     */
    private $nom;

    /**
     * @var string $pays
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     * @Groups({"aeroports_read", "aeroports_write"})
     */
    private $pays;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPays(): ?string
    {
        return $this->pays;
    }

    public function setPays(string $pays): self
    {
        $this->pays = $pays;

        return $this;
    }
}
