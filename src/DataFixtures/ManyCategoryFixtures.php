<?php


namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class ManyCategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');

        for ($i = 0; $i < 50; $i++) {
            $category = new Category();
            $category->setName($faker->word(7));
            $category->setSlug($faker->word(10));
            $manager->persist($category);
        }
        $manager->flush();
    }
}