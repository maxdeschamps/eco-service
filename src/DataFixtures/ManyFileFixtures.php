<?php


namespace App\DataFixtures;

use App\Entity\File;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class ManyFileFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');

        for ($i = 0; $i < 50; $i++) {
            $file = new File();
            $file->setName($faker->word(7));
            $file->setAlt($faker->text);
            $file->setOrder($faker->randomNumber());
            $file->setUri($faker->imageUrl($width = 640, $height = 480));
            $manager->persist($file);
        }
        $manager->flush();
    }
}