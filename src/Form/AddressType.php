<?php

namespace App\Form;

use App\Entity\Address;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class AddressType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('line1', TextareaType::class, [
              'label' => '1ère ligne :',
            ])
            ->add('line2', TextareaType::class, [
              'label' => '2ème ligne :'
            ])
            ->add('postal_code', TextType::class, [
              'label' => 'Code postal :'
            ])
            ->add('city', TextType::class, [
              'label' => 'Ville :'
            ])
            ->add('country', TextType::class, [
              'label' => 'Pays :'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Address::class,
        ]);
    }
}
