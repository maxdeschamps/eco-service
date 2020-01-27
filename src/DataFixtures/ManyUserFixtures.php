<?php
namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class ManyUserFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');

        for ($i = 0; $i < 50; $i++) {
            $personne = new User();
            $personne->setFirstName($faker->firstName);
            $personne->setLastName($faker->lastName);
            $personne->setPhone($faker->phoneNumber);
            $personne->setPassword($faker->sha1);
            $personne->setEmail($faker->email);
            $personne->setNewsletterAcceptance(intval($faker->boolean));
            $manager->persist($personne);
        }

        $manager->flush();
    }
}