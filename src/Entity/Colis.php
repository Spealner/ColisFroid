<?php

namespace App\Entity;

use App\Repository\ColisRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=ColisRepository::class)
 *
 * @author Spealner@gmail.com
 */
class Colis
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="string")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank()
     */
    private $number;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank()
     */
    private $nombre;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     */
    private $loadinglab;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     */
    private $deliverylab;

    /**
     * @ORM\ManyToMany(targetEntity=Vehicules::class, inversedBy="colis")
     */
    private $vehicule;

    public function __construct()
    {
        $this->vehicule = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumber(): ?int
    {
        return $this->number;
    }

    public function setNumber(int $number): self
    {
        $this->number = $number;

        return $this;
    }

    public function getNombre(): ?int
    {
        return $this->nombre;
    }

    public function setNombre(int $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getLoadinglab(): ?string
    {
        return $this->loadinglab;
    }

    public function setLoadinglab(string $loadinglab): self
    {
        $this->loadinglab = $loadinglab;

        return $this;
    }

    public function getDeliverylab(): ?string
    {
        return $this->deliverylab;
    }

    public function setDeliverylab(string $deliverylab): self
    {
        $this->deliverylab = $deliverylab;

        return $this;
    }

    /**
     * @return Collection|Vehicules[]
     */
    public function getVehicule(): Collection
    {
        return $this->vehicule;
    }

    public function addVehicule(Vehicules $vehicule): self
    {
        if (!$this->vehicule->contains($vehicule)) {
            $this->vehicule[] = $vehicule;
        }

        return $this;
    }

    public function removeVehicule(Vehicules $vehicule): self
    {
        $this->vehicule->removeElement($vehicule);

        return $this;
    }
}
