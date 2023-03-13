<?php

namespace App\Controller\Admin;

use App\Entity\Product;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ProductCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Product::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            yield TextField::new('title')->renderAsHtml(),
            yield TextField::new('subtitle')->renderAsHtml(),
            yield TextareaField::new('description')->renderAsHtml(),
            
            yield ImageField::new('illustration')
                                ->setBasePath('/img')
                                ->setUploadDir('public/img')
                                ->setUploadedFileNamePattern('[randomhash]'.'[extension]')
                                ->setRequired(false),

            yield ImageField::new('sound')
                                ->setBasePath('/sound')
                                ->setUploadDir('public/sound')
                                ->hideOnIndex()
                                ->setUploadedFileNamePattern('[randomhash]'.'[extension]')
                                ->setRequired(false),

            yield TextField::new('sound')
                                ->hideOnForm()
                                ->renderAsHtml('public/sound'),

            yield AssociationField::new('category')->autocomplete()
        ];
    }
    
}
