<?php

namespace App\DataFixtures;

// src/DataFixtures/AppFixtures.php
namespace App\DataFixtures;

use App\Entity\Cannon;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class CanonsFixtures extends Fixture implements OrderedFixtureInterface
{
    /**
     * @param ObjectManager $manager The manager of the database we need to use to create our content
     * This method will automatically create all the data we need according to the database.
     * To call this method use the php bin/console doctrine:fixtures:load command
     * Warning, this will reset your database !
     */
    public function load(ObjectManager $manager)
    {
        $ship_list = [];
        for ($j = 0; $j < 3; $j ++) {
            $ship_list[$j] = $this->getReference('ship-' . $j);
        }

        // Création des canons
        for ($i = 0; $i < 10; $i++) {
            $canon = new Cannon();
            $canon->setName("Canon-" . $i)->setPower(mt_rand(1,100));

            if ($i < 3 ) { // Make sure every ship has at least 1 canon
                $canon->setShip($ship_list[$i]);
            } else {
                $canon->setShip($ship_list[mt_rand(0,2)]);
            }
            $manager->persist($canon);
        }

        // Nous sauvegardons en base de données
        $manager->flush();
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 2;
    }
}