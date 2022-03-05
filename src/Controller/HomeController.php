<?php

namespace App\Controller;

use App\Entity\Colis;
use App\Form\AddBoxType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route ("/", name="home")
     *
     * @return Response
     */
    public function index(): Response
    {
        return $this->render('home/home.html.twig');
    }

    /**
     * @Route("/colis/add", name="add_colis")
     * @Route("/colis/{id}/update", name="box_update")
     *
     * @param Colis|null $colis
     * @param Request $request
     *
     * @return Response
     */
    public function addColisAndUpdate(?Colis $colis,Request $request): Response
    {
        if(!$colis) {
            $colis = new Colis();
        }

        $form = $this->createForm(AddBoxType::class, $colis);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            if (!$colis->getId()) {
                $colis = $form->getData();

                $entityManager->persist($colis);
                $entityManager->flush();

                return $this->redirectToRoute('add_colis');
            }
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->flush();

            return $this->redirectToRoute('all_colis');
        }

        return $this->render('colis/addcolis.html.twig', [
            'addColisForm' => $form->createView(),
            'editMode' => $colis->getId() !== null
        ]);
    }
}
