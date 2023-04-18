<?php

namespace App\Form;

use App\Entity\Categorie;
use App\Entity\Client;
use phpDocumentor\Reflection\Type;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('societe')
            ->add('nom')
            ->add('prenom')
            ->add('adresse')
            ->add('codePostal')
            ->add('ville')
            ->add('pays')
            ->add('telMobile')
            ->add('telBureau')
            ->add('fax')
            ->add('email')
            ->add('siteWeb')
            ->add('nomSociete')
            ->add('type', ChoiceType::class, [
                'choices' => [
                    'SARL' => null,
                    'SARL AU' => null,
                    'PP' => null,
                ],
            ])
            ->add('rc')
            ->add('capital')
            ->add('cnss')
            ->add('patente')
            ->add('identicicationFiscale')
            ->add('ice')
            ->add('Categorie', EntityType::class, [
                'class' => categorie::class
            ])# ->add('Submit',SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Client::class,
        ]);
    }
}
