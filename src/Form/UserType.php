<?php

namespace App\Form;

use App\Entity\User;
use App\Form\AddressType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class, [
              'label' => 'Email :'
            ])
            ->add('password', PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'label' => 'Mot de passe :',
                'mapped' => false,
                'constraints' => [
                  new NotBlank([
                    'message' => 'Veuillez entrer votre mot de passe',
                  ]),
                  new Length([
                    'min' => 6,
                    'minMessage' => 'Votre mot de passe doit contenir {{ limit }} caractères',
                    // max length allowed by Symfony for security reasons
                    'max' => 30,
                  ]),
                ]
            ])
            ->add('firstName', TextType::class, [
              'label' => 'Prénom :'
            ])
            ->add('lastName', TextType::class, [
              'label' => 'Nom :'
            ])
            ->add('phone', TextType::class, [
              'label' => 'Téléphone :'
            ])
            ->add('isCompany', CheckboxType::class, [
              'label' => 'Vous êtes une société ?',
              'required' => false
            ])
            ->add('companyName', TextType::class, [
              'label' => 'Nom de la société :',
              'required' => false
            ])
            ->add('newsletterAcceptance', CheckboxType::class, [
              'label' => 'Recevoir la newsletter :',
              'required' => false
            ])
            ->add('deliveryAddress', AddressType::class, [
              'label' => 'Adresse de livraison :',
              'attr' => ['class' => 'marginTextarea']
            ])
            ->add('billingAddress', AddressType::class, [
              'label' => 'Adresse de facturation : ',
              'attr' => ['class' => 'marginTextarea']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
