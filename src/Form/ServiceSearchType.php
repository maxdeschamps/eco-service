<?php

namespace App\Form;

use App\Entity\Category;
use Doctrine\ORM\Mapping\Entity;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use App\Data\SearchData;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ServiceSearchType extends AbstractType
{
  public function buildForm(FormBuilderInterface $builder, array $options)
  {
    $builder
      ->add('q', TextType::class, [
        'label' => false,
        'required' => false,
      ])
      ;
  }

  public function configureOptions(OptionsResolver $resolver)
  {
    $resolver-> setDefaults([
      'data_class' => SearchData::class,
      'method' => 'GET',
      'csrf_protection' => false
    ]);
  }

  public function getBlockPrefix()
  {
    return '';
  }
}
