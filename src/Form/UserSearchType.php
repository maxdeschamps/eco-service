<?php

namespace App\Form;

use app\Entity\UserSearch;
//use Doctrine\DBAL\Types\IntegerType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
class UserSearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('min_note',IntegerType::class,[
                'required' =>false,
                'label' =>false,
                'attr' =>[
                    'placeholder' =>'note minimale'
                ]
            ])
            ->add('max_weight', IntegerType::class,[
                'required' =>false,
                'label' =>false,
                'attr' =>[
                    'placeholder' =>'poids maximale'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => UserSearch::class,
            'method' =>'get',
            'csrf_protection' =>false
        ]);
    }
    public function getBlockPrefix()
    {
        return '';
        //return parent::getBlockPrefix(); // TODO: Change the autogenerated stub
    }
}
