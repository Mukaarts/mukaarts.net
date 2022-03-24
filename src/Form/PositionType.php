<?php

namespace App\Form;

use App\Entity\Position;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PositionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title')
            ->add('type', ChoiceType::class, [
                'choices' => [
                    'Full-time' => Position::TYPE_FULL_TIME,
                    'Part-time' => Position::TYPE_PART_TIME,
                    'Internship' => Position::TYPE_INTERNSHIP,
                ],
            ])
            ->add('startDate', DateType::class, [
                'input' => 'datetime_immutable',
                'by_reference' => false,
                'years' => range(date('Y'), date('Y') - 100),
            ])
            ->add('endDate', DateType::class, [
                'required' => false,
                'input' => 'datetime_immutable',
                'by_reference' => false,
                'years' => range(date('Y'), date('Y') - 100),
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Position::class,
        ]);
    }
}
