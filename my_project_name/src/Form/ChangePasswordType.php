<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

class ChangePasswordType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class,[
                'disabled' => true,
                'label' => 'Mon adresse email'
            ])
            ->add('firstname', TextType::class,[
                'label' => 'Mon prénom'
            ])
            ->add('lastname', TextType::class,[
                'label' => 'Mon nom'
            ])
            ->add('old_password', PasswordType::class,[
                'label' => 'Mon mot de passe actuel',
                'mapped' => false,
                'attr' => [
                    'placeholder' => 'Veuillez saisir votre mot de passe actuel'
                ]
            ])
            ->add('new_password', RepeatedType::class, [
                'type' => PasswordType::class,
                'mapped' => false, //ici il ne lie pas ce nouveau paramettre avec mon entité.
                'invalid_message' => 'Le mot de passe et la confirmation doivent être identique.',
                'label' => 'Votre nouveau mot de passe',
                'required' => true,
                'first_options' => ['label' => 'Votre nouveau mot de passe',
                'attr' => ['placeholder' => 'Merci de saisir votre mot de passe']
            ],
                
                'second_options' => ['label' => 'Confirmez votre nouveau mot de passe',
                'attr' => ['placeholder' => 'Merci de confirmez votre nouveau mot de passe']
            ],
            ])
            ->add('submit', SubmitType::class, [
                'label' => "Enregistré"
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
