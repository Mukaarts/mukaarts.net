<?php

namespace App\Controller\Admin\Field;

use A2lix\TranslationFormBundle\Form\Type\TranslationsType;
use EasyCorp\Bundle\EasyAdminBundle\Contracts\Field\FieldInterface;
use EasyCorp\Bundle\EasyAdminBundle\Field\FieldTrait;

class TranslationField implements FieldInterface
{
    use FieldTrait;

    /**
     * @param array<string,  string> $fieldsConfig
     */
    public static function new(string $propertyName, ?string $label = null, array $fieldsConfig = []): self
    {
        return (new self())
            ->setProperty($propertyName)
            ->setLabel($label)
            ->setFormType(TranslationsType::class)
            ->setFormTypeOptions([
                'default_locale' => 'en',
                'fields' => $fieldsConfig,
            ]);
    }
}
