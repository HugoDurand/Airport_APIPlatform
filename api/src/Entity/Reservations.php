<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Annotation\ApiSubresource;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ReservationsRepository")
 * @ApiResource(
 *     attributes={"access_control"="is_granted('ROLE_USER')"},
 *     normalizationContext={"groups"={"reservations_read"}},
 *     denormalizationContext={"groups"={"reservations_write"}},
 *     collectionOperations={
 *          "get",
 *          "post"={"access_control"="is_granted('ROLE_ADMIN')", "access_control_message"="Seul les admins peuvent ajouter des reservations."}
 *     },
 *     itemOperations={
 *          "get",
 *          "put"={"access_control"="object.owner == user", "denormalization_context"={"groups" = {"reservations_user_write"}}},
 *          "delete"={"access_control"="is_granted('ROLE_ADMIN')",  "access_control_message"="Seul les admins peuvent supprimer des reservations."}
 *     }
 * )
 */
class Reservations
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var  string $numero
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     * @Groups({"reservations_read", "reservations_write"})
     */
    private $numero;


    /**
     * @var Vols $vol
     * @ORM\ManyToOne(targetEntity="App\Entity\Vols")
     * @ORM\JoinColumn(nullable=false)
     * @Assert\NotBlank
     * @Groups({"reservations_read", "reservations_write"})
     * @ApiSubresource
     */
    private $vol;

    /**
     * @var  string $classe
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     * @Groups({"reservations_read", "reservations_write"})
     */
    private $classe;

    /**
     * @var boolean $checkIn
     * @ORM\Column(type="boolean")
     * @Groups({"reservations_read", "reservations_user_write"})
     */
    private $checkIn;

    /**
     * @var  Clients $clients
     * @ORM\ManyToMany(targetEntity="App\Entity\Clients")
     * @Assert\NotBlank
     * @Groups({"reservations_read", "reservations_write"})
     * @ApiSubresource
     */
    private $clients;

    public function __construct()
    {
        $this->clients = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumero(): ?string
    {
        return $this->numero;
    }

    public function setNumero(string $numero): self
    {
        $this->numero = $numero;

        return $this;
    }

    public function getVol(): ?Vols
    {
        return $this->vol;
    }

    public function setVol(?Vols $vol): self
    {
        $this->vol = $vol;

        return $this;
    }

    public function getClasse(): ?string
    {
        return $this->classe;
    }

    public function setClasse(string $classe): self
    {
        $this->classe = $classe;

        return $this;
    }

    public function getCheckIn(): ?bool
    {
        return $this->checkIn;
    }

    public function setCheckIn(bool $checkIn): self
    {
        $this->checkIn = $checkIn;

        return $this;
    }

    /**
     * @return Collection|Clients[]
     */
    public function getClients(): Collection
    {
        return $this->clients;
    }

    public function addClient(Clients $client): self
    {
        if (!$this->clients->contains($client)) {
            $this->clients[] = $client;
        }

        return $this;
    }

    public function removeClient(Clients $client): self
    {
        if ($this->clients->contains($client)) {
            $this->clients->removeElement($client);
        }

        return $this;
    }
}
