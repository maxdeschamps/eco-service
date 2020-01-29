<?php


namespace App\DataFixtures;

use App\Entity\Role;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class ManyRoleFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');

        for ($i = 0; $i < 50; $i++) {
            $role = new Role();
            $role->setName($faker->word(7));
            $role->setSlug($faker->word(10));
            $manager->persist($role);
        }
        $manager->flush();
    }
}