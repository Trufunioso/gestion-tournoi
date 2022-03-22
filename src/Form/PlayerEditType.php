<?php

namespace App\Form;

use App\Entity\Player;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class PlayerEditType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('username', TextType::class, [
                'label_attr' => ['class' => 'form-label'],
                'required' => true,
                'attr' => ['class' => 'form-control']
            ])
            ->add('firstname', TextType::class, [
                'label_attr' => ['class' => 'form-label'],
                'required' => true,
                'attr' => ['class' => 'form-control']
            ])
            ->add('lastname', TextType::class, [
                'label_attr' => ['class' => 'form-label'],
                'required' => true,
                'attr' => ['class' => 'form-control']
            ])
            ->add('birthdate', BirthdayType::class, [
                'widget' => 'single_text',
                // this is actually the default format for single_text
                'format' => 'yyyy-MM-dd',
                'label_attr' => ['class' => 'form-label'],
                'required' => true,
                'attr' => ['class' => 'form-control']
            ])
            ->add('elo', IntegerType::class, [
                'label_attr' => ['class' => 'form-label'],
                'required' => true,
                'attr' => ['class' => 'form-control']
            ])
            ->add('gender', ChoiceType::class, [
                'choices' => [
                    'Homme' => 'H',
                    'Femme' => 'F'
                ],
                'label_attr' => ['class' => 'form-label'],
                'required' => true,
                'attr' => ['class' => 'form-control']
            ])
            ->add('picture', FileType::class, [
                'data_class' => null,
                'required' => true,
                'constraints' => [
                    new File(['maxSize' => '2m'])
                ],
                'attr' => ['class' => 'form-control']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Player::class,
        ]);
    }
}
