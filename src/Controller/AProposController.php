<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AProposController extends AbstractController
{
    /**
     * @Route("/a-propos", name="a_propos")
     *
     * @return Response
     */
    public function index(): Response
    {
        return $this->render('a_propos/apropos.html.twig', [
            'controller_name' => 'AProposController',
        ]);
    }
}
