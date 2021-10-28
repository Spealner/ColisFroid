<?php

namespace App\Controller;

use App\Entity\Colis;
use App\Form\AddBoxType;
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
            5 /*limit per page*/
        );

        return $this->render('home/home.html.twig', [
            'colis' => $allBox,
        ]);
    }

    /**
     * @Route("/colis/add", name="add_colis")
     */
    public function addSondes(Request $request): Response
    {
        $colis = new Colis();

        $form = $this->createForm(AddBoxType::class, $colis);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $colis = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($colis);
            $entityManager->flush();

            return $this->redirectToRoute('add_colis');
        }

        return $this->render('colis/addcolis.html.twig', [
            'addColisForm' => $form->createView()
        ]);
    }
}
