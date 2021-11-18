<?php

namespace App\Entity;

use App\Repository\ColisVehiculesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ColisVehiculesRepository::class)
 */
class ColisVehicules
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $colis_id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $vehicules_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getColisId(): ?int
    {
        return $this->colis_id;
    }

    public function setColisId(?int $colis_id): self
    {
        $this->colis_id = $colis_id;

        return $this;
    }

    public function getVehiculesId(): ?int
    {
        return $this->vehicules_id;
    }

    public function setVehiculesId(?int $vehicules_id): self
    {
        $this->vehicules_id = $vehicules_id;

        return $this;
    }
}
