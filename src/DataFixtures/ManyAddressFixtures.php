<?php

namespace App\DataFixtures;

use App\Entity\Address;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class ManyAddressFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');

        for ($i = 0; $i < 50; $i++) {
            $address = new Address();
            $address->setLine1($faker->address);
            $address->setLine2($faker->address);
            $address->setPostalCode($faker->postcode);
            $address->setCity($faker->city);
            $address->setCountry($faker->country);
            $manager->persist($address);
        }
        $manager->flush();
    }
}