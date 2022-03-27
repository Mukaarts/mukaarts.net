<?php

namespace App\Controller\Admin;

use App\Entity\Mentor;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class MentorCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Mentor::class;
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
