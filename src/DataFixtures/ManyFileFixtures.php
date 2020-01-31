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
            //$file->setUri($faker->image($dir = 'public/image',400,300));
            $file->setOrder($faker->numberBetween(0,50));
            $file->setAlt($faker->text);
            $manager->persist($file);
        }
        $manager->flush();
    }
}