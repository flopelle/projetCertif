<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

        ->add('firstname',TextType::class, [
            'label' => 'Prénom',
            'constraints' => new Length([
                'min' => 2,
                'max' => 30
            ]),
            'attr' => [
                'placeholder' => 'Saisissez votre prénom'
            ]
        ])
        ->add('lastname', TextType::class, [
            'label' => 'Nom',
            'constraints' => new Length([
                'min' => 2,
                'max' => 30
            ]),
            'attr' => [
                'placeholder' => 'Saisissez votre nom'
            ]

        ])
        ->add('email', EmailType::class, [
                'label' => 'Email',
                'constraints' => new Length([
                    'min' => 2,
                    'max' => 60
                ]),
                'attr' => [
                    'placeholder' => 'Saisissez votre email'
                ]

            ])


        ->add('password', RepeatedType::class, [
            'type' => PasswordType::class,
            'invalid_message'=> 'Le mot de passe et la confirmation doivent être identique.',
            'constraints' => [
                new Regex([
                    'pattern' =>"/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[@$!%*#?&^_-]).{8,}$/",
                    'message' => 'Renseignez au moins 1 minuscule, 1 majuscule , 1 chiffre et 1 caractère spécial.'  
                ])
            ],
            'label' => 'Mot de passe',
            'required' => true,
            'first_options' => 
            ['label' => 'Mot de passe',
            'attr' => [
                'placeholder' => 'Merci de saisir votre mot de passe'
            ]
            ],
            'second_options' => 
            ['label' => 'Confirmez votre mot de passe',
            'attr' => [
                'placeholder' => 'Merci de confirmer votre mot de passe'
        ]]])

        ->add('submit', SubmitType::class, [
            'label' => "S'inscrire"

        ])
    ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
