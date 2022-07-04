<?php

namespace App\Form;

use App\Entity\UserRemerciements;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class RemerciementType extends AbstractType
{//Création du formulaire
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('membre', ChoiceType::class, [ //Input type select
                'choices' => [
                    'Alice' => 'Alice',
                    'Céline' => 'Céline',
                    'Geoffroy' => 'Geoffroy',
                    'Laetitia' => 'Laetitia',
                    'Laura' => 'Laura',
                    'Myriam' => 'Myriam',
                ],"attr" => [
                    "class"=>"form-control", 
                ]
            ])
            ->add('raison_remerciement',TextType::class, [ //input type text
                "attr" => [
                    "class"=>"form-control"
                ],
            ])
            ->add('membre_remercie',ChoiceType::class, [
                'choices' => [
                    'Alice' => 'Alice',
                    'Céline' => 'Céline',
                    'Geoffroy' => 'Geoffroy',
                    'Laetitia' => 'Laetitia',
                    'Laura' => 'Laura',
                    'Myriam' => 'Myriam',
                ], 
                "attr" => [
                    "class"=>"form-control",
                ],
            ])
            ->add('date_remerciement',DateType::class, [ //input type date
                "attr" => [
                    "class"=>"form-control"
                ]
            ])
        ;
        
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => UserRemerciements::class,
        ]);
    }
}
