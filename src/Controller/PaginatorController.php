<?php

namespace App\Controller;

use App\Repository\ColisRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @author Spealner@gmail.com
 */
class PaginatorController extends AbstractController
{
    /**
     * // Pagination automatique
     *
     * @param ColisRepository $colisRepository
     * @param PaginatorInterface $paginator
     * @param Request $request
     * @return mixed
     */
    public function paginator(
        ColisRepository $colisRepository,
        PaginatorInterface $paginator,
        Request $request

    ): mixed
    {
        $data = $colisRepository->allBox();

        $container = $this->container;

        $paginator = $container->get('knp_paginator');
        $results = $paginator->paginate(
            $data,
            $request->query->getInt('page', 1), /* numéro de page, 1 par défaut */
            $request->query->getInt('limit', 15) /* limite par page par défaut */
        );
        return ($results);
    }
}