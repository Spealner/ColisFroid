<?php

namespace App\Twig;

use App\Repository\VehiculesRepository;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class AppExtension extends AbstractExtension
{
    private $vehiculesRepository;

    public function __construct(VehiculesRepository $vehiculesRepository)
    {
        $this->vehiculesRepository = $vehiculesRepository;
    }

    public function getFunctions()
    {
        return [
            new TwigFunction('vehiculesNavbar', [$this, 'vehicules']),
        ];
    }

    public function vehicules(): array
    {
        return $this->vehiculesRepository->findAll();
    }
}