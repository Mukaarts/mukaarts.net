<?php

namespace App\Controller\Admin;

use App\Entity\EmploymentType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class EmploymentTypeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return EmploymentType::class;
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
