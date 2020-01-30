<?php


namespace App\DataFixtures;

use App\Entity\Subject;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class ManySubjectFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');

        for ($i = 0; $i < 50; $i++) {
            $subject = new Subject();
            $subject->setName($faker->word(7));
            $subject->setSlug($faker->word(10));
            $manager->persist($subject);
        }
        $manager->flush();
    }
}