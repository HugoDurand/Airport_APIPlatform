<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\VolsRepository")
 */
class Vols
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $numero;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Avions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $avion;

    /**
     * @ORM\Column(type="datetime")
     */
    private $heureDepart;

    /**
     * @ORM\Column(type="datetime")
     */
    private $heureArrivee;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Aeroports")
     * @ORM\JoinColumn(nullable=false)
     */
    private $aeroportDepart;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Aeroports")
     * @ORM\JoinColumn(nullable=false)
     */
    private $aeroportArrivee;

    /**
     * @ORM\Column(type="integer")
     */
    private $prix;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Pistes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $piste;

    /**
     * @ORM\Column(type="boolean")
     */
    private $escales;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Employes")
     */
    private $employes;

    public function __construct()
    {
        $this->employes = new ArrayCollection();
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

    public function getAvion(): ?Avions
    {
        return $this->avion;
    }

    public function setAvion(?Avions $avion): self
    {
        $this->avion = $avion;

        return $this;
    }

    public function getHeureDepart(): ?\DateTimeInterface
    {
        return $this->heureDepart;
    }

    public function setHeureDepart(\DateTimeInterface $heureDepart): self
    {
        $this->heureDepart = $heureDepart;

        return $this;
    }

    public function getHeureArrivee(): ?\DateTimeInterface
    {
        return $this->heureArrivee;
    }

    public function setHeureArrivee(\DateTimeInterface $heureArrivee): self
    {
        $this->heureArrivee = $heureArrivee;

        return $this;
    }

    public function getAeroportDepart(): ?Aeroports
    {
        return $this->aeroportDepart;
    }

    public function setAeroportDepart(?Aeroports $aeroportDepart): self
    {
        $this->aeroportDepart = $aeroportDepart;

        return $this;
    }

    public function getAeroportArrivee(): ?Aeroports
    {
        return $this->aeroportArrivee;
    }

    public function setAeroportArrivee(?Aeroports $aeroportArrivee): self
    {
        $this->aeroportArrivee = $aeroportArrivee;

        return $this;
    }

    public function getPrix(): ?int
    {
        return $this->prix;
    }

    public function setPrix(int $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getPiste(): ?Pistes
    {
        return $this->piste;
    }

    public function setPiste(?Pistes $piste): self
    {
        $this->piste = $piste;

        return $this;
    }

    public function getEscales(): ?bool
    {
        return $this->escales;
    }

    public function setEscales(bool $escales): self
    {
        $this->escales = $escales;

        return $this;
    }

    /**
     * @return Collection|Employes[]
     */
    public function getEmployes(): Collection
    {
        return $this->employes;
    }

    public function addEmploye(Employes $employe): self
    {
        if (!$this->employes->contains($employe)) {
            $this->employes[] = $employe;
        }

        return $this;
    }

    public function removeEmploye(Employes $employe): self
    {
        if ($this->employes->contains($employe)) {
            $this->employes->removeElement($employe);
        }

        return $this;
    }
}
