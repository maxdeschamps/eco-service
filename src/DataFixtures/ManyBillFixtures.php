<?php
namespace App\DataFixtures;

use App\Entity\Bill;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class ManyBillFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');

        for ($i = 0; $i < 50; $i++) {
            $bill = new Bill();
            $bill->setCustomer($manager->getRepository(User::class)->find(1));
            $bill->setRequestDate($faker->dateTime());
            $bill->setAcceptanceDate($faker->dateTime());
            $bill->setEmail($faker->email);
            $bill->setApproved(intval($faker->boolean));
            $manager->persist($bill);
        }
        $manager->flush();
    }

}