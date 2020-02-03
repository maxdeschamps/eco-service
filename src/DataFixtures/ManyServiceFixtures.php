<?php
namespace App\DataFixtures;

use App\Entity\File;
use App\Entity\Service;
use App\Entity\Unity;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class ManyServiceFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');

        for ($i = 0; $i < 50; $i++) {
            $service = new Service();
            $service->setUnity($manager->getRepository(Unity::class)->find(1));
            $service->setAuthor($manager->getRepository(User::class)->find(1));
            $service->setSlug($faker->word(10));
            $service->setContent($faker->text);
            $service->setName($faker->word(7));
            $service->setQuantity($faker->numberBetween(0,50));
            $service->setPriceHt($faker->numberBetween($min = 1000, $max = 30000));
            $service->setPriceTtc($faker->numberBetween($min = 1000, $max = 30000));
            $manager->persist($service);
        }
        $manager->flush();
    }
}
