<?php
namespace App\DataFixtures;

use App\Entity\Company;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class ManyCompanyFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');

        for ($i = 0; $i < 50; $i++) {
            $company = new Company();
            $company->setFirstName($faker->firstName);
            $company->setLastName($faker->lastName);
            $company->setName($faker->word(10));
            $company->setPhone($faker->phoneNumber);
            $company->setPassword($faker->password);
            $company->setEmail($faker->email);
            $company->setNewsletterAcceptance(intval($faker->boolean));
            $manager->persist($company);
        }
        $manager->flush();
    }

}