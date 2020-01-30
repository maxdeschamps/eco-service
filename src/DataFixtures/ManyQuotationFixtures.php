<?php
namespace App\DataFixtures;

use App\Entity\Company;
use App\Entity\Quotation;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class ManyQuotationFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');

        for ($i = 0; $i < 50; $i++) {
            $quotation = new Quotation();
            $quotation->setCompany($manager->getRepository(Company::class)->find(1));
            $quotation->setRequestDate($faker->dateTime());
            $quotation->setAcceptanceDate($faker->dateTime());
            $quotation->setEmail($faker->email);
            $quotation->setApproved(intval($faker->boolean));
            $manager->persist($quotation);
        }
        $manager->flush();
    }

}