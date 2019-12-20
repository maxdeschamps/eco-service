<?php

namespace App\Form;

use App\Entity\Ship;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ShipType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        /* Utiliser la méthode add() pour générer un champ pour la taille */
        /* Ajouter un label personnalisé sur chaque champ pour afficher respectivement "nom", "prix",
            et "taille" à la place des champs en anglais.
            Consulter les autres fichiers du dossier /Form pour trouver des exemples
         */
        /*
         * Réglage de la taille minimale du nom : Consulter le fichier Entity/Ship.php à l'attribut "name"
         * */
        $builder
            ->add('name', null, [
                'help' => 'Le nom de votre vaisseau', // Petit message d'aide qui va s'afficher sous le champ
            ])
            ->add('price')
            ->add('type', ChoiceType::class, ['choices' => $this->types()]) // Notez bien la manière dont on utilise le champ du type, on en aura besoin pour l'AJAX avec les planètes
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Ship::class,
        ]);
    }

    /**
     *
     */
    private function types(): array
    {
        $choices = Ship::TYPE;
        $output = [];
        foreach($choices as $k => $v) {
            $output[$v] = $v;
        }

        return $output;
    }
}
