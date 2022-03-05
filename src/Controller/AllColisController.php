<?php

namespace App\Controller;

use App\Entity\Colis;
use App\Repository\ColisRepository;
use App\Repository\VehiculesRepository;
use Knp\Component\Pager\PaginatorInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @author Spealner@gmail.com
 */
class AllColisController extends AbstractController
{
    /**
     * @Route("/all/colis", name="all_colis")
     * @IsGranted("ROLE_USER")
     *
     * @param ColisRepository $colisRepository
     * @param VehiculesRepository $vehiculesRepository
     * @param PaginatorInterface $paginator
     * @param Request $request
     *
     * @return Response
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
     * @IsGranted("ROLE_ADMIN")
     *
     * @param Colis $colis
     *
     * @return RedirectResponse
     */
    public function delete(Colis $colis): RedirectResponse
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($colis);
        $em->flush();

        return $this->redirectToRoute('all_colis');
    }
}
