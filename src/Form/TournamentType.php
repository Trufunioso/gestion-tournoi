<?php

namespace App\Form;

use App\Entity\Tournament;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\DataTransformer\BooleanToStringTransformer;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TournamentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('tournoiName', TextType::class, [
                'label_attr' => ['class' => 'form-label'],
                'required' => true,
                'attr' => ['class' => 'form-control']
            ])
            ->add('city', TextType::class, [
                'label_attr' => ['class' => 'form-label'],
                'required' => true,
                'attr' => ['class' => 'form-control']
            ])
            ->add('date', DateType::class, [
                'widget' => 'single_text',
                'label_attr' => ['class' => 'form-label'],
                'required' => true,
                'attr' => ['class' => 'form-control']
            ])
            ->add('ranked', ChoiceType::class, [
                'choices' => [
                  'oui' =>  true,
                  'non' => false
                ],
                'label_attr' => ['class' => 'form-label'],
                'required' => true,
                'attr' => ['class' => 'form-control']
            ])
            ->add('eloMin', IntegerType::class, [
                'label_attr' => ['class' => 'form-label'],
                'required' => true,
                'attr' => ['class' => 'form-control']
            ])
            ->add('eloMax', IntegerType::class, [
                'label_attr' => ['class' => 'form-label'],
                'required' => true,
                'attr' => ['class' => 'form-control']
            ])
            ->add('gender', ChoiceType::class, [
                'choices' => [
                    'Homme' => 'H',
                    'Femme' => 'F',
                    'Mixte' => 'M'
            ],
                'label_attr' => ['class' => 'form-label'],
                'required' => true,
                'attr' => ['class' => 'form-control']
            ])
            ->add('round', IntegerType::class, [
                'label_attr' => ['class' => 'form-label'],
                'required' => true,
                'attr' => ['class' => 'form-control']
            ])
            ->add('playerMin', IntegerType::class, [
                'label_attr' => ['class' => 'form-label'],
                'required' => true,
                'attr' => ['class' => 'form-control']
            ])
            ->add('playerMax', IntegerType::class, [
                'label_attr' => ['class' => 'form-label'],
                'required' => true,
                'attr' => ['class' => 'form-control']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Tournament::class,
        ]);
    }
}
