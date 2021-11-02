<?php

namespace App\Services;

use App\Entity\Colis;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class AddColis
{
    public function add(Colis $colis, SessionInterface $session)
    {
        // on récupère le panier actuel
        $panier = $session->get("panier", []);
        $id = $colis->getId();

        if(!empty($panier[$id])) {
            $panier[$id]++;
        } else {
            $panier[$id] = 1;
        }

        // on sauvegarde le panier dans la session
        $session->set("panier", $panier);
    }
}