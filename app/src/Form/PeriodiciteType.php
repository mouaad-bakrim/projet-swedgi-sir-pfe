<?php

namespace App\Form;

use App\Entity\Periodicite;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PeriodiciteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('designation')
            ->add('duree', ChoiceType::class, [
                'choices'  => [
                    '1/12' => '1/12',
                    '1/4' => '1/4',
                    '1' => '1',
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Periodicite::class,
        ]);
    }

}
