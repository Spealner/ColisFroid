<?php

namespace App\Controller;

use App\Entity\Vehicules;
use App\Form\AddVehiculeType;
use App\Repository\ColisRepository;
use App\Repository\VehiculesRepository;
use Knp\Component\Pager\PaginatorInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @author Spealner@gmail.com
 */
class VehiculesController extends AbstractController
{
    /**
     * // all vehicles
     *
     * @Route("/vehicules", name="vehicules")
     *
     * @param VehiculesRepository $vehiculesRepository
     *
     * @return Response
     */
    public function index(VehiculesRepository $vehiculesRepository): Response
    {
        return $this->render('vehicules/vehicules.html.twig', [
            'vehicules' => $vehiculesRepository->findAll(),
        ]);
    }

    /**
     * // all box in vehicles
     *
     * @Route("/{nom}", name="vehicules_nom")
     * @IsGranted("ROLE_USER")
     *
     * @param Vehicules $vehicules
     * @param ColisRepository $colisRepository
     * @param PaginatorInterface $paginator
     * @param Request $request
     *
     * @return Response
     */
    public function vehicule(
        Vehicules $vehicules,
        ColisRepository $colisRepository,
        PaginatorInterface $paginator,
        Request $request
    )
    : Response
    {
        $colis = $colisRepository->findAllVehicules($vehicules);

        $allBox = $paginator->paginate(
            $colis, /*query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            10 /*limit per page*/
        );

        return $this->render('vehicules/allbox.html.twig', [
            'vehicule' => $vehicules,
            'colis' => $allBox,
        ]);
    }

    /**
     * // add vehicles
     *
     * @Route("/vehicule/add", name="add_vehicule")
     * @IsGranted("ROLE_ADMIN")
     *
     * @param Request $request
     *
     * @return Response
     */
    public function addVehicule(Request $request): Response
    {
        $vehicule = new Vehicules();

        $form = $this->createForm(AddVehiculeType::class, $vehicule)->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $vehicule = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($vehicule);
            $entityManager->flush();

            return $this->redirectToRoute('add_vehicule');
        }

        return $this->render('vehicules/addvehicule.html.twig', [
            'addVehiculeForm' => $form->createView()
        ]);
    }

    /**
     * // delete vehicles from tables
     *
     * @Route("/vehicule/{id}/delete", name="vehicule_delete")
     * @IsGranted("ROLE_ADMIN")
     */
    public function deleteVehicule(Vehicules $vehicules)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($vehicules);
        $em->flush();

        return $this->redirectToRoute('vehicules');
    }
}
