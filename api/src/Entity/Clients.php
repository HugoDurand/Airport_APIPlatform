<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiSubresource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ClientsRepository")
 * @ApiResource(
 *     attributes={"access_control"="is_granted('ROLE_USER')"},
 *     normalizationContext={"groups"={"clients_read"}},
 *     denormalizationContext={"groups"={"clients_write"}},
 *     collectionOperations={
 *          "get",
 *          "post",
 *     },
 *     itemOperations={
 *          "get",
 *          "put",
 *          "delete"={"access_control"="is_granted('ROLE_ADMIN')",  "access_control_message"="Seul les admins peuvent supprimer des clients."}
 *     }
 * )
 */
class Clients
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
     * @Groups({"clients_read", "clients_write"})
     */
    private $nom;

    /**
     * @var string $prenom
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     * @Groups({"clients_read", "clients_write"})
     */
    private $prenom;

    /**
     * @var string $numeroTitreIdentite
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     * @Groups({"clients_read", "clients_write"})
     */
    private $numeroTitreIdentite;

    /**
     * @var integer $age
     * @ORM\Column(type="integer")
     * @Assert\NotBlank
     * @Groups({"clients_read", "clients_write"})
     */
    private $age;

    /**
     * @var string $sexe
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     * @Groups({"clients_read", "clients_write"})
     */
    private $sexe;

    /**
     * @var string $email
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     * @Assert\Email
     * @Groups({"clients_read", "clients_write"})
     */
    private $email;

    /**
     * @var integer $tel
     * @ORM\Column(type="integer")
     * @Assert\NotBlank
     * @Groups({"clients_read", "clients_write"})
     */
    private $tel;

    /**
     * @var string $adresse
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     * @Groups({"clients_read", "clients_write"})
     */
    private $adresse;

    public function __construct()
    {
        $this->reservations = new ArrayCollection();
    }

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

    public function getNumeroTitreIdentite(): ?string
    {
        return $this->numeroTitreIdentite;
    }

    public function setNumeroTitreIdentite(string $numeroTitreIdentite): self
    {
        $this->numeroTitreIdentite = $numeroTitreIdentite;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(int $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function getSexe(): ?string
    {
        return $this->sexe;
    }

    public function setSexe(string $sexe): self
    {
        $this->sexe = $sexe;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getTel(): ?int
    {
        return $this->tel;
    }

    public function setTel(int $tel): self
    {
        $this->tel = $tel;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }
}
