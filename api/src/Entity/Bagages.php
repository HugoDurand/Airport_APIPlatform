<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiSubresource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\BagagesRepository")
 * @ApiResource(
 *     attributes={"access_control"="is_granted('ROLE_USER')"},
 *     normalizationContext={"groups"={"bagages_read"}},
 *     denormalizationContext={"groups"={"bagages_write"}},
 *     collectionOperations={
 *          "get",
 *          "post"={"access_control"="is_granted('ROLE_ADMIN')", "access_control_message"="Seul les admins peuvent ajouter des bagages."}
 *     },
 *     itemOperations={
 *          "get",
 *          "put"={"access_control"="is_granted('ROLE_ADMIN')",  "access_control_message"="Seul les admins peuvent modifier des bagages."},
 *          "delete"={"access_control"="is_granted('ROLE_ADMIN')",  "access_control_message"="Seul les admins peuvent supprimer des bagages."}
 *     }
 * )
 */
class Bagages
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var Clients $client
     * @ORM\ManyToOne(targetEntity="App\Entity\Clients")
     * @ORM\JoinColumn(nullable=false)
     * @Assert\NotBlank
     * @Groups({"bagages_read", "bagages_write"})
     * @ApiSubresource
     */
    private $client;

    /**
     * @var integer $poid
     * @ORM\Column(type="integer", nullable=true)
     * @Groups({"bagages_read", "bagages_write"})
     */
    private $poid;

    /**
     * @var boolean $soute
     * @ORM\Column(type="boolean", nullable=true)
     * @Groups({"bagages_read", "bagages_write"})
     */
    private $soute;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getClient(): ?Clients
    {
        return $this->client;
    }

    public function setClient(?Clients $client): self
    {
        $this->client = $client;

        return $this;
    }

    public function getPoid(): ?int
    {
        return $this->poid;
    }

    public function setPoid(?int $poid): self
    {
        $this->poid = $poid;

        return $this;
    }

    public function getSoute(): ?bool
    {
        return $this->soute;
    }

    public function setSoute(?bool $soute): self
    {
        $this->soute = $soute;

        return $this;
    }
}
