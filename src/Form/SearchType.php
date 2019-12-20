<?php

namespace App\Form;

use App\Entity\Search2;
use Doctrine\DBAL\Types\IntegerType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('maxNote',IntegerType::class,[
                'required' =>false,
                'label'=>false,
                'attr'=>[
                    'placeholder' =>'note maximale'
                ]
            ])
            ->add('minWeight', IntegerType::class,[
                'required' =>false,
                'label'=>false,
                'attr'=>[
                    'placeholder' =>'poids minimale'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Search2::class,
            'method' =>'get',
            'csrf_protection' =>false
        ]);
    }

}
