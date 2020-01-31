<?php
namespace App\DataFixtures;

use App\Entity\Address;
use App\Entity\Resume;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class ManyResumeFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');

        for ($i = 0; $i < 50; $i++) {
            $resume = new Resume();
            $resume->setDeliveryAddress($manager->getRepository(Address::class)->find(1));
            $resume->setBillingAddress($manager->getRepository(Address::class)->find(1));
            $resume->setRequestDate($faker->dateTime());
            $resume->setAcceptanceDate($faker->dateTime());
            $resume->setApproved(intval($faker->boolean));
            $resume->setEmail($faker->email);
            $manager->persist($resume);
        }
        $manager->flush();
    }

}