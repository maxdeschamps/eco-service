<?php
namespace App\DataFixtures;

use App\Entity\Quotation;
use App\Entity\ServiceQuotation;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class ManyServiceQuotationsFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');

        for ($i = 0; $i < 50; $i++) {
            $serviceQuotation = new ServiceQuotation();
            $serviceQuotation->setQuotation($manager->getRepository(Quotation::class)->find(1));
            $serviceQuotation->setQuantity($faker->numberBetween(0,50));
            $serviceQuotation->setExtra($faker->text);
            $manager->persist($serviceQuotation);
        }
        $manager->flush();
    }

}