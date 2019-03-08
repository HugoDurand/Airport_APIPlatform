<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EmployesRepository")
 * @ApiResource(
 *     attributes={"access_control"="is_granted('ROLE_USER')"},
 *     normalizationContext={"groups"={"employes_read"}},
 *     denormalizationContext={"groups"={"employes_write"}},
 *     collectionOperations={
 *          "get",
 *          "post"={"access_control"="is_granted('ROLE_ADMIN')", "access_control_message"="Seul les admins peuvent ajouter des employes."}
 *     },
 *     itemOperations={
 *          "get",
 *          "put"={"access_control"="is_granted('ROLE_ADMIN')",  "access_control_message"="Seul les admins peuvent modifier des employes."},
 *          "delete"={"access_control"="is_granted('ROLE_ADMIN')",  "access_control_message"="Seul les admins peuvent supprimer des employes."}
 *     }
 * )
 */
class Employes
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
     * @Groups({"employes_read", "employes_write"})
     */
    private $nom;

    /**
     * @var string $prenom
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     * @Groups({"employes_read", "employes_write"})
     */
    private $prenom;

    /**
     * @var string $job
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     * @Groups({"employes_read", "employes_write"})
     */
    private $job;

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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getJob(): ?string
    {
        return $this->job;
    }

    public function setJob(string $job): self
    {
        $this->job = $job;

        return $this;
    }
}
