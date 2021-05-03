<?php

namespace App\Controller\Admin;

use App\Entity\Inscrire;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class InscrireCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Inscrire::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
