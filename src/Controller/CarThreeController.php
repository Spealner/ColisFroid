<?php

namespace App\Controller;

use App\Entity\Colis;
use App\Repository\ColisRepository;
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
    public function add(Colis $colis, SessionInterface $session)
    {
        // on récupère le panier actuel
        $panier3 = $session->get("panier3", []);
        $id = $colis->getId();

        if(!empty($panier3[$id])) {
            $panier3[$id]++;
        } else {
            $panier3[$id] = 1;
        }

        // on sauvegarde le panier dans la session
        $session->set("panier3", $panier3);

        return $this->redirectToRoute('home');
    }

    /**
     * @Route("véhicule3/remove/{id}", name="car_three_remove")
     */
    public function remove(Colis $colis, SessionInterface $session)
    {
        // on récupère le panier actuel
        $panier3 = $session->get("panier3", []);
        $id = $colis->getId();

        if(!empty($panier3[$id])) {
            if ($panier3[$id] > 1) {
                $panier3[$id]--;
            } else {
                unset($panier3[$id]);
            }
        }

        // on sauvegarde le panier dans la session
        $session->set("panier3", $panier3);

        return $this->redirectToRoute('car_three');
    }
}
