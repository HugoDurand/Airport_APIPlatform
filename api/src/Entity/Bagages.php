<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\BagagesRepository")
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
     * @ORM\ManyToOne(targetEntity="App\Entity\Clients")
     * @ORM\JoinColumn(nullable=false)
     */
    private $client;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $poid;

    /**
     * @ORM\Column(type="boolean", nullable=true)
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
