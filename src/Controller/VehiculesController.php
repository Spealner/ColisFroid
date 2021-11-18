<?php

namespace App\Controller;

use App\Entity\Vehicules;
use App\Form\AddVehiculeType;
use App\Repository\ColisRepository;
use App\Repository\VehiculesRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VehiculesController extends AbstractController
{
    /**
     * @Route("/vehicules", name="vehicules")
     */
    public function index(VehiculesRepository $vehiculesRepository): Response
    {
        return $this->render('vehicules/vehicules.html.twig', [
            'vehicules' => $vehiculesRepository->findAll(),
        ]);
    }

    /**
     * @Route("/vehicules/{nom}", name="vehicules_nom")
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
     * @Route("/vehicule/add", name="add_vehicule")
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
     * @Route("/vehicule/{id}/delete", name="vehicule_delete")
     */
    public function deleteVehicule(Vehicules $vehicules)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($vehicules);
        $em->flush();

        return $this->redirectToRoute('vehicules');
    }
}
