<?php

namespace App\Services;

use App\Entity\Colis;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class RemoveColis
{
    public function removeColis(Colis $colis, SessionInterface $session)
    {
        // on récupère le panier actuel
        $panier = $session->get("panier", []);
        $id = $colis->getId();

        if(!empty($panier[$id])) {
            if ($panier[$id] > 1) {
                $panier[$id]--;
            } else {
                unset($panier[$id]);
            }
        }

        // on sauvegarde le panier dans la session
        $session->set("panier", $panier);
    }
}