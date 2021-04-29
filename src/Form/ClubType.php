<?php

namespace App\Form;

use Symfony\Component\Form\Extension\Core\Type\FileType;
use App\Entity\Club;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClubType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Nom')
            ->add('imageUpload', FileType::class,[
                'label'=> "Upload de l'image",
                'mapped' => false,
                'required'=> false,
                ])
            ->add('DateCreation')
            ->add('DateDebutSaison')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Club::class,
        ]);
    }
}
