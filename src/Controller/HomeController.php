<?php

namespace App\Controller;

use App\Repository\ColisRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     *@Route("/", name="home")
     */
    public function index(ColisRepository $colisRepository): Response
    {
        return $this->render('home/home.html.twig', [
            'colis' => $colisRepository->allBox(),
        ]);
    }
}
