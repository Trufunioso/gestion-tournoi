<?php

namespace App\Form;

use App\Entity\Player;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('username', TextType::class, [
                'label_attr' => ['class' => 'form-label'],
                'required' => true,
                'attr' => ['class' => 'form-control']
            ])
            ->add('agreeTerms', CheckboxType::class, [
                'label_attr' => ['class' => 'form-label'],
                'required' => true,


                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => 'You should agree to our terms.',
                    ]),
                ],
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
                'required' => true,
                'constraints' => [
                    new File(['maxSize' => '2m'])
                ],
                'attr' => ['class' => 'form-control']
            ])
            ->add('plainPassword', PasswordType::class, [
                'required' => true,

                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
                'attr' => ['autocomplete' => 'new-password',
                    'class' => 'form-control'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a password',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Your password should be at least {{ limit }} characters',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
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
