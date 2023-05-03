<?php

namespace App\Form;

use App\Entity\Periodicite;
use App\Entity\Tache;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
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
            ->add('designation',ChoiceType::class, [
        'choices'  => [
            'add designation'=>'ffff',
            'Mensuel' => 'Mensuel',
            'Trimestriel' => 'Trimestriel',
            'Annuel' => 'Annuel',
            'direct'=>'direct'
        ],
    ])
            ->add('Periodicite', ChoiceType::class, [
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
            ->add('Task')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Tache::class,
        ]);
    }
}
