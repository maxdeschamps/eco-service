<?php

namespace App\Form;

use App\Entity\Payment;
use App\Entity\Subject;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class PaymentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom : '
            ])
            ->add('num_bluecard', TextType::class, [
              'label' => 'Numéro de carte'
            ])

            ->add('crypto', TextType::class, [
              'label' => 'Cryptogramme visuel'
            ])

            ->add('expiration_date', DateType::class, [
              'label'=> 'Date d\'expiration'
            ])
            ->add('agreeTerms', CheckboxType::class, [
                'label' => 'En cochant cette case, vous acceptez nos conditions générales de vente',
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => 'Vous devez accepter nos conditions',
                    ]),
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Payment::class,
        ]);
    }
}
