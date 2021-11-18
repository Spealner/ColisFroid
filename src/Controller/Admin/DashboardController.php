<?php

namespace App\Controller\Admin;

use App\Entity\Colis;
use App\Entity\Vehicules;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Colisfroid');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToRoute('Acceuil de l\'application', 'fa ...', 'home');
        yield MenuItem::linkToCrud('Trier les colis', 'fas fa-list', Colis::class);
        yield MenuItem::linkToCrud('Trier les véhicules', 'fas fa-list', Vehicules::class);
    }
}
