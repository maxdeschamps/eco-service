<?php

namespace App\Form;

use App\Entity\Category;
use Doctrine\ORM\Mapping\Entity;
use app\Entity\ProductSearch;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class ProductSearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('min_priceTtc',IntegerType::class,[
                'required' =>false,
                'label' =>false,
                'attr' =>[
                    'placeholder' =>'prix minimum'
                ]
            ])
            ->add('max_priceTtc', IntegerType::class,[
                'required' =>false,
                'label' =>false,
                'attr' =>[
                    'placeholder' =>'prix maximum'
                ]
            ])

            ->add('submit', SubmitType::class, [
                'label' => 'Rechercher',
                'attr' => [
                    'class' => 'btn btn-success'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ProductSearch::class,
            'method' =>'get',
            'csrf_protection' =>false
        ]);
    }
}
