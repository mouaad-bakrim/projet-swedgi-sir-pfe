<?php

namespace App\Form;
use App\Entity\Tache;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TacheType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('description')
            ->add('designation', ChoiceType::class, [
                'choices'  => [
                    'add Tache' => 'add Tache',
                    'CNSS' => 'CNSS',
                    'salaire' => 'salaire',
                    'TVA' => 'PP',
                    'IR' => 'IR',
                    'Bilan' => 'Bilan',
                    'taxeProfessionnelle' => 'taxeProfessionnelle',
                    'livreCoteParaphe' => 'livreCoteParaphe',
                    'tenueDeComptabilite' => 'tenueDeComptabilite',
                    'revision' => 'revision',
                    'saisie' => 'saisie',
                    'acompteIs' => 'acompteIs',
                    'autre' => 'autre',
                    'transformationPP' => 'transformationPP',
                ],
            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Tache::class,
        ]);
    }
}




