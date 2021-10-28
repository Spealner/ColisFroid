<?php

namespace App\Entity;

use App\Repository\ColisRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ColisRepository::class)
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
     */
    private $number;

    /**
     * @ORM\Column(type="integer")
     */
    private $nombre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $loadinglab;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $deliverylab;

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
}
