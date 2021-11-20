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

class CarOneController extends AbstractController
{
    /**
     * @Route("/vehicule1", name="car_one")
     */
    public function index(ColisRepository $colisRepository, SessionInterface $session): Response
    {
        // On récupère le panier
        $panier = $session->get("panier", []);

        // On fabrique les données
        $dataPanier = [];

        foreach ($panier as $id => $quantite) {
            $dataPanier[] = [
                "product" => $colisRepository->find($id),
                "quantite" => $quantite
            ];
        }

        return $this->render('car_one/carone.html.twig', [
            'items' => $dataPanier
        ]);
    }

    /**
     * @Route("véhicule1/add/{id}", name="car_one_add")
     */
    public function addBox(AddColis $addColis, int $id)
    {
        $addColis->add();

        return $this->redirectToRoute('home');
    }

    /**
     * @Route("véhicule1/remove/{id}", name="car_one_remove")
     */
    public function removeColis(RemoveColis $removeColis, int $id)
    {
        $removeColis->removeColis();

        return $this->redirectToRoute('car_one');
    }
}
