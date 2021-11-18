<?php

namespace App\Controller;

use App\Entity\Colis;
use App\Entity\Vehicules;
use App\Repository\ColisRepository;
use App\Repository\VehiculesRepository;
use Doctrine\Common\Collections\Collection;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AllColisController extends AbstractController
{
    /**
     * @Route("/all/colis", name="all_colis")
     */
    public function index(
        ColisRepository $colisRepository,
        VehiculesRepository $vehiculesRepository,
        PaginatorInterface $paginator,
        Request $request
    )
    : Response
    {
        $data = $colisRepository->allBox();

        $allBox = $paginator->paginate(
            $data, /*query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            15 /*limit per page*/
        );

        return $this->render('all_colis/allcolis.html.twig', [
            'colis' => $allBox,
            'vehicules' => $vehiculesRepository->findAll()
        ]);
    }

    /**
     * @Route("/colis/{id}/delete", name="box_delete")
     */
    public function delete(Colis $colis)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($colis);
        $em->flush();

        return $this->redirectToRoute('all_colis');
    }

    /**
     * @Route("/colis/{id}/remove", name="remove_box")
     */
    public function removeBox(Colis $colis)
    {
        return $this->redirectToRoute('all_colis');
    }
}
