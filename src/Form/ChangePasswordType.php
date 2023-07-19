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
            ->add('firstName', TextType::class, [
                'disabled' => true,
                'label' => 'Mon Prénom'
            ])
            ->add('lastName', TextType::class, [
                'disabled' => true,
                'label' => 'Mon Nom'
            ])
            ->add('phone', TextType::class, [
                'disabled' => true,
                'label' => 'Mon numéros de téléphone'
            ])
            ->add('email', EmailType::class, [
                'disabled' => true,
                'label' => 'Mon adresse mail'
            ])
            ->add('old_password', PasswordType::class, [
                'mapped' => false,
                'label' => 'Mon mot de passe actuel', 
                    'attr' => [
                        'placeholder' => 'Veuillez saisir votre mot de passe actuel',
                ]
            ])
            ->add('new_password', RepeatedType::class, [
                'type' => PasswordType::class,
                'mapped' => false,
                'invalid_message' => 'Vos mots de passes ne sont pas identiques',
                'required' => true,
                'first_options' => [
                    'label' => 'Votre nouveau mot de passe'
                ],
                'second_options' => [
                    'label' => 'Veuillez confirmez votre nouveau mot de passe'
                ],
            ])
            ->add('submit', SubmitType::class, [
                'label' => "Mettre à jour"
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
