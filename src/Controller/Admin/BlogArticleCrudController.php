<?php

namespace App\Controller\Admin;

use App\Entity\BlogArticle;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class BlogArticleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return BlogArticle::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('title');
        yield TextEditorField::new('content');
        yield DateField::new('createdAt');
        yield BooleanField::new('isPublished');
    }
}
