<?php
namespace App\DataFixtures;

use App\Entity\File;
use App\Entity\Service;
use App\Entity\ServiceFile;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class ManyServiceFileFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');

        for ($i = 0; $i < 50; $i++) {
            $serviceFile = new ServiceFile();
            $serviceFile->setFile($manager->getRepository(File::class)->find(1));
            $serviceFile->setService($manager->getRepository(Service::class)->find(1));
            $manager->persist($serviceFile);
        }
        $manager->flush();
    }
}