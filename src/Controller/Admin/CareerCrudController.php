<?php

namespace App\Controller\Admin;

use App\Entity\Career;
use App\Form\PositionType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CareerCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Career::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('company');
        yield DateField::new('startDate');
        yield CollectionField::new('positions')->setEntryType(PositionType::class);
    }
}
