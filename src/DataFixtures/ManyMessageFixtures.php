<?php
namespace App\DataFixtures;

use App\Entity\Message;
use App\Entity\Subject;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class ManyMessageFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');

        for ($i = 0; $i < 50; $i++) {
            $message = new Message();
            $message->setAuthor($manager->getRepository(User::class)->find(1));
            $message->setSubject($manager->getRepository(Subject::class)->find(1));
            $message->setState($faker->word(100));
            $manager->persist($message);
        }
        $manager->flush();
    }
}