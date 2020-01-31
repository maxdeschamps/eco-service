<?php
namespace App\DataFixtures;

use App\Entity\Bill;
use App\Entity\ProductBill;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class ManyProductBillFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');

        for ($i = 0; $i < 50; $i++) {
            $productBill = new ProductBill();
            $productBill->setBill($manager->getRepository(Bill::class)->find(1));
            $productBill->setQuantity($faker->numberBetween(0,50));
            $manager->persist($productBill);
        }
        $manager->flush();
    }

}