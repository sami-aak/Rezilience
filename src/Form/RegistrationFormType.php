<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add(
                'email', EmailType::class,
                [
                    'required' => true,
                    'label' => 'Email* :',
                ])
            ->add('plainPassword', PasswordType::class, 
                [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'label' => 'Mot de passe :',
                'mapped' => false,
                'attr' => ['autocomplete' => 'new-password'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a password',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Your password should be at least {{ limit }} characters',
                        // max length allowed by Symfony for security reasons
                        'max' => 128,
                    ]),
                ],
            ])
            ->add(
                'nom', TextType::class,
                [
                    'required' => false,
                    'label' => 'Nom : ',
                ]
                )
            ->add(
                'prenom', TextType::class,
                [
                    'required' => false,
                    'label' => 'Prénom :',
                ]
                )
            ->add(
                'date_de_naissance', DateType::class,
                [
                    'required' => false,
                    'label' => 'Date de naissance :',
                    'widget' => 'single_text', // Vous pouvez choisir le widget de votre choix
                    'html5' => true, // Utilisation des attributs HTML5 pour le champ date
                    // 'format' => 'dd-MM-yyyy'
                ]
                )
            ->add(
                'domaine_activite', TextType::class,
                [
                    'required' => false,
                    'label' => "Domaine d'activité :",
                ]
                )
            ->add(
                'exp_pro', TextType::class,
                [
                    'required' => false,
                    'label' => 'Expérience professionnelle (en années) : ',
                ]
                )
          
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
