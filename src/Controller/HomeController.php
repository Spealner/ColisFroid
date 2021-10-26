<?php

namespace App\Controller;

use App\Repository\ColisRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     *@Route("/", name="home")
     */
    public function index(
        ColisRepository $colisRepository,
        PaginatorInterface $paginator,
        Request $request

    ): Response
    {
        $data = $colisRepository->allBox();

        $allBox = $paginator->paginate(
            $data, /*query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            10 /*limit per page*/
        );

        return $this->render('home/home.html.twig', [
            'colis' => $allBox,
        ]);
    }
}
