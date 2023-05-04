<?php

namespace App\Form;

use App\Entity\TypeTache;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TypeTacheType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('mission', ChoiceType::class, [
                'choices'  => [
                    'add Tache' => 'tache',
                    'CNSS' => 'CNSS',
                    'salaire' => 'salaire',
                    'TVA' => 'TVA',
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

            ->add('designation',ChoiceType::class, [
                'choices'  => [
                    'add designation'=>'ffff',
                    'Mensuel' => 'Mensuel',
                    'Trimestriel' => 'Trimestriel',
                    'Annuel' => 'Annuel',
                    'direct'=>'direct'
                ],
            ])
            ->add('description')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => TypeTache::class,
        ]);
    }
}
