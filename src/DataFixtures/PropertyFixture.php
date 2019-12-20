<?php

namespace App\DataFixtures;
//inclut Tous les entités ou bundles qu'on utilisera
use App\Entity\User;
use App\Entity\Ship;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class PropertyFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // Le but de cette fonction est de pouvoir ajouter  une liste de données (Dans le  cas ci-dessous par exemple les fausses données seront généré automatiquement grâce à une librairie php "Faker". Cette librairie php nécéssite d'avoir  une version de php  >= 5.3.3 )
    	// Nous allons utiliser factory pour créer une instance du génerateur Faker
        // Faker\Factory::create() permet de créer et d'initialiser un générateur de faker, qui peut générer des données
		$faker = Factory::create('fr_FR');
		//on fait une boucle pour afficher les  fausses utilisateurs qui sera généré automatiquement grâce au Faker
    		for($i =0;  $i<80; $i++){
    		    // On crée un objet de type user qui prendra une liste des attributs qu'on souhaite généré (ex: name, note)
    			$user = new User();
    			$user->setName($faker->name);
                $user->setNote($faker ->numberBetween(10,1000));
                $user->setWeight($faker ->numberBetween(10,100));
                //Permet de dire à Doctrine qu'on veut sauvegarder la liste des utilisateurs
				$manager->persist($user);
    	}
    		//Execute la requette d'insertion des utilisateurs
            $manager->flush();
    }
}
