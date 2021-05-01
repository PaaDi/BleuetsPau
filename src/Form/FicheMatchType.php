<?php

namespace App\Form;

use App\Entity\FicheMatch;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FicheMatchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('DateDebut')
            ->add('Nom')
            ->add('Stade')
            ->add('ArbitrePrincipal')
            ->add('ArbitreAssistant1')
            ->add('ArbitreAssistant2')
            ->add('EquipeDomicile')
            ->add('EquipeExterieure')
            ->add('status')
            ->add('buteur')
            ->add('score')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => FicheMatch::class,
        ]);
    }
}
