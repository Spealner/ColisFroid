<?php

namespace App\Controller;

use App\Entity\Colis;
use App\Repository\ColisRepository;
use App\Services\AddColis;
use App\Services\RemoveColis;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class CarThreeController extends AbstractController
{
    /**
     * @Route("/vehicule3", name="car_three")
     */
    public function index(ColisRepository $colisRepository, SessionInterface $session): Response
    {
        // On récupère le panier
        $panier3 = $session->get("panier3", []);

        // On fabrique les données
        $dataPanier3 = [];

        foreach ($panier3 as $id => $quantite) {
            $dataPanier3[] = [
                "product" => $colisRepository->find($id),
                "quantite" => $quantite
            ];
        }

        return $this->render('car_three/carthree.html.twig', [
            'items' => $dataPanier3
        ]);
    }

    /**
     * @Route("véhicule3/add/{id}", name="car_three_add")
     */
    public function addBox(AddColis $addColis, int $id)
    {
        $addColis->add();

        return $this->redirectToRoute('home');
    }

    /**
     * @Route("véhicule3/remove/{id}", name="car_three_remove")
     */
    public function removeColis(RemoveColis $removeColis, int $id)
    {
        $removeColis->removeColis();

        return $this->redirectToRoute('car_three');
    }
}
