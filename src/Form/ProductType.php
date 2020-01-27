<?php

namespace App\Form;

use App\Entity\Product;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name',TextType::class,[
                'required' =>true,
                'label'=>'Nom'
            ])
            // ->add('slug')
            ->add('content',TextareaType::class,[
                'required' =>true,
                'label'=>'Contenu'
            ])
            ->add('price_ht',IntegerType::class,[
                'required' =>true,
                'label'=>'Prix HT'
            ])
            ->add('price_ttc',IntegerType::class,[
                'required' =>true,
                'label'=>'Prix TTC'
            ])
            ->add('quantity',IntegerType::class,[
                'required' =>true,
                'label'=>'Quantité'
            ])
            // ->add('files')
            // ->add('author')
            // ->add('category')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
        ]);
    }
}
