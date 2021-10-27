<?php

namespace App\Controller;

use App\Repository\ColisRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CarOneController extends AbstractController
{
    /**
     * @Route("/vehicule1", name="car_one")
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

        return $this->render('car_one/carone.html.twig', [
            'colis' => $allBox,
        ]);
    }
}
