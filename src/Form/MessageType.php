<?php

namespace App\Form;

use App\Entity\Message;
use App\Entity\Subject;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;



class MessageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('content', TextareaType::class, [
                'label' => 'Votre message : '
            ])
            ->add('subject', EntityType::class, [
                'class' => Subject::class,
                'label' => 'Sujet : '
            ])
            ->add('email', EmailType::class, [
                'label' => 'Email : '
            ])
            ->add('firstName', TextType::class, [
                'label' => 'Prénom : '
            ])
            ->add('lastName', TextType::class, [
                'label' => 'Nom : '
            ])
            ->add('agreeTerms', CheckboxType::class, [
                'label' => 'En cochant cette case, vous acceptez nos conditions d\'utilisation',
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
            'data_class' => Message::class,
        ]);
    }
}
