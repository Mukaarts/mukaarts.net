<?php

namespace App\Controller\Admin;

use A2lix\TranslationFormBundle\Form\Type\TranslationsType;
use App\Controller\Admin\Field\TranslationField;
use App\Entity\EmploymentType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;

class EmploymentTypeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return EmploymentType::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TranslationField::new('translations', 'Translations')->hideOnIndex(),
            Field::new('getCurrentLocaleTitle')->onlyOnIndex(),
        ];
    }
}
