<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VolsRepository")
 * @ApiResource(
 *     attributes={"access_control"="is_granted('ROLE_USER')"},
 *     normalizationContext={"groups"={"vols_read"}},
 *     denormalizationContext={"groups"={"vols_write"}},
 *     collectionOperations={
 *          "get",
 *          "post"={"access_control"="is_granted('ROLE_ADMIN')", "access_control_message"="Seul les admins peuvent ajouter des vols."}
 *     },
 *     itemOperations={
 *          "get",
 *          "put"={"access_control"="is_granted('ROLE_ADMIN')",  "access_control_message"="Seul les admins peuvent modifier des vols."},
 *          "delete"={"access_control"="is_granted('ROLE_ADMIN')",  "access_control_message"="Seul les admins peuvent supprimer des vols."}
 *     }
 * )
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
     * @var string $numero
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     * @Groups({"vols_read"})
     */
    private $numero;

    /**
     * @var Avions $avion
     * @ORM\ManyToOne(targetEntity="App\Entity\Avions")
     * @ORM\JoinColumn(nullable=false)
     * @Assert\NotBlank
     * @Groups({"vols_read", "vols_write"})
     */
    private $avion;

    /**
     * @var \DateTime $heureDepart
     * @ORM\Column(type="datetime")
     * @Assert\NotBlank
     * @Assert\DateTime
     * @Groups({"vols_read", "vols_write"})
     */
    private $heureDepart;

    /**
     * @var \DateTime $heureArrivee
     * @ORM\Column(type="datetime")
     * @Assert\NotBlank
     * @Assert\DateTime
     * @Groups({"vols_read", "vols_write"})
     */
    private $heureArrivee;

    /**
     * @var Aeroports $aeroportDepart
     * @ORM\ManyToOne(targetEntity="App\Entity\Aeroports")
     * @ORM\JoinColumn(nullable=false)
     * @Assert\NotBlank
     * @Groups({"vols_read", "vols_write"})
     */
    private $aeroportDepart;

    /**
     * @var Aeroports $aeroportArrivee
     * @ORM\ManyToOne(targetEntity="App\Entity\Aeroports")
     * @ORM\JoinColumn(nullable=false)
     * @Assert\NotBlank
     * @Groups({"vols_read", "vols_write"})
     */
    private $aeroportArrivee;

    /**
     * @var integer $prix
     * @ORM\Column(type="integer")
     * @Assert\NotBlank
     * @Groups({"vols_read", "vols_write"})
     */
    private $prix;

    /**
     * @var Pistes $piste
     * @ORM\ManyToOne(targetEntity="App\Entity\Pistes")
     * @ORM\JoinColumn(nullable=false)
     * @Assert\NotBlank
     * @Groups({"vols_read", "vols_write"})
     */
    private $piste;

    /**
     * @var boolean $escales
     * @ORM\Column(type="boolean")
     * @Assert\NotBlank
     * @Groups({"vols_read", "vols_write"})
     */
    private $escales;

    /**
     * @var Employes $employes
     * @ORM\ManyToMany(targetEntity="App\Entity\Employes")
     * @Assert\NotBlank
     * @Groups({"vols_read", "vols_write"})
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
