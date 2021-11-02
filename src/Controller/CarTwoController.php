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

class CarTwoController extends AbstractController
{
    /**
    * @Route("/vehicule2", name="car_two")
    */
    public function index(ColisRepository $colisRepository, SessionInterface $session): Response
    {
        // On récupère le panier
        $panier2 = $session->get("panier2", []);

        // On fabrique les données
        $dataPanier2 = [];

        foreach ($panier2 as $id => $quantite) {
            $dataPanier2[] = [
                "product" => $colisRepository->find($id),
                "quantite" => $quantite
            ];
        }

        return $this->render('car_two/cartwo.html.twig', [
            'items' => $dataPanier2
        ]);
    }

    /**
     * @Route("véhicule2/add/{id}", name="car_two_add")
     */
    public function addBox(AddColis $addColis, int $id)
    {
        $addColis->add();

        return $this->redirectToRoute('home');
    }

    /**
     * @Route("véhicule2/remove/{id}", name="car_two_remove")
     */
    public function removeColis(RemoveColis $removeColis, int $id)
    {
        $removeColis->removeColis();

        return $this->redirectToRoute('car_two');
    }
}
