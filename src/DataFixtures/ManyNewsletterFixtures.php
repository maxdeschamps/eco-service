<?php

namespace App\DataFixtures;

use App\Entity\Newsletter;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class ManyNewsletterFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');

        for ($i = 0; $i < 50; $i++) {
            $newsletter = new Newsletter();
            $newsletter->setAuthor($manager->getRepository(User::class)->find(1));
            $newsletter->setFiles($manager->getRepository(File::class)->find(1));
            $newsletter->setSubject($faker->word(25));
            $newsletter->setContent($faker->text);
            $manager->persist($newsletter);
        }
        $manager->flush();
    }
}