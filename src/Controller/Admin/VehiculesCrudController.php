<?php

namespace App\Controller\Admin;

use App\Entity\Vehicules;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class VehiculesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Vehicules::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nom'),
        ];
    }
}
