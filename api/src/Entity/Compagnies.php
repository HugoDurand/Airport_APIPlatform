<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CompagniesRepository")
 * @ApiResource(
 *     attributes={"access_control"="is_granted('ROLE_USER')"},
 *     normalizationContext={"groups"={"compagnies_read"}},
 *     denormalizationContext={"groups"={"compagnies_write"}},
 *     collectionOperations={
 *          "get",
 *          "post"={"access_control"="is_granted('ROLE_ADMIN')", "access_control_message"="Seul les admins peuvent ajouter des compagnies."}
 *     },
 *     itemOperations={
 *          "get",
 *          "put"={"access_control"="is_granted('ROLE_ADMIN')",  "access_control_message"="Seul les admins peuvent modifier des compagnies."},
 *          "delete"={"access_control"="is_granted('ROLE_ADMIN')",  "access_control_message"="Seul les admins peuvent supprimer des compagnies."}
 *     }
 * )
 */
class Compagnies
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
     * @Groups({"compagnies_read", "compagnies_write"})
     */
    private $nom;

    /**
     * @var string $origine
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     * @Groups({"compagnies_read", "compagnies_write"})
     */
    private $origine;

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

    public function getOrigine(): ?string
    {
        return $this->origine;
    }

    public function setOrigine(string $origine): self
    {
        $this->origine = $origine;

        return $this;
    }
}
