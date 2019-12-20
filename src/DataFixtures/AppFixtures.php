<?php

namespace App\DataFixtures;

// src/DataFixtures/AppFixtures.php
namespace App\DataFixtures;

use App\Entity\Cannon;
use App\Entity\Ship;
use App\Repository\ShipRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture implements OrderedFixtureInterface
{
    /**
     * @param ObjectManager $manager The manager of the database we need to use to create our content
     * This method will automatically create all the data we need according to the database.
     * To call this method use the php bin/console doctrine:fixtures:load command
     * Warning, this will reset your database !
     */
    public function load(ObjectManager $manager)
    {
        // Nous utilisons des tableaux ici pour permettre à la boucle d'intégrer des noms particuliers plutôt que de
        // générer des données aléatoires. Cela nous sert pour avoir toujours les mêmes noms et les mêmes images.
        $shipNames = ['Le andré destroyer', 'Le Schtroumpf grognon', 'Richard Parker'];
        $shipImages = [
            '/images/ships/vaisseau_1.jpeg',
            '/images/ships/vaisseau_2.jpg',
            '/images/ships/vaisseau_3.jpg',
        ];
        // Nous créons 3 vaisseaux avec des données aléatoires et des données fixes
        for ($i = 0; $i < 3; $i++) {
            $ship = new Ship();
            $ship->setName($shipNames[$i]);
            $ship->setPrice(mt_rand(10, 10000));
            $ship->setTaille(mt_rand(10, 500));
            $ship->setType("Destroyer");
            $ship->setImage($shipImages[$i]);
            // Nous prévenons l'objet Manager d'ajouter l'objet courant au panier de sauvegarde
            $manager->persist($ship);

            $this->addReference('ship-' . $i, $ship);
        }
        $manager->flush();
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 1;
    }
}

