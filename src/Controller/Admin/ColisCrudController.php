<?php

namespace App\Controller\Admin;

use App\Entity\Colis;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ColisCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Colis::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            NumberField::new('number'),
            NumberField::new('nombre'),
            TextField::new('loadinglab'),
            TextField::new('deliverylab'),
            AssociationField::new('vehicule')->hideWhenCreating(),
        ];
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setDefaultSort(['id' => 'DESC']);
    }
}
