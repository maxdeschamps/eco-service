<?php

namespace App\DataFixtures;

use App\Entity\Address;
use App\Entity\Category;
use App\Entity\Role;
use App\Entity\User;
use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class ManyProductFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');

        for ($i = 0; $i < 50; $i++) {
            $category = new Category();
            $category->setName($faker->word(7));
            $category->setSlug($faker->word(10));

            $manager->persist($category);

            for ($i = 0; $i < 4; $i++) {
                $role = new Role();
                $role->setName($faker->word(7));
                $role->setSlug($faker->word(10));

                $manager->persist($role);
            }

            for ($i = 0; $i < 50; $i++) {
                $address = new Address();
                $address->setLine1($faker->address);
                $address->setLine2($faker->address);
                $address->setPostalCode($faker->postcode);
                $address->setCity($faker->city);
                $address->setCountry($faker->country);

                $manager->persist($address);
            }

            for ($i = 0; $i < 50; $i++) {
                $personne = new User();
                $personne->setFirstName($faker->firstName);
                $personne->setLastName($faker->lastName);
                $personne->setPhone($faker->phoneNumber);
                $personne->setPassword($faker->password);
                $personne->setEmail($faker->email);
                $personne->setNewsletterAcceptance(intval($faker->boolean));

                $manager->persist($personne);
            }

            for ($i = 0; $i < 50; $i++) {
                $produit = new Product();
                $produit->setCategory($category);
                $produit->setAuthor($personne);
                $produit->setName($faker->word(7));
                $produit->setSlug($faker->word(10));
                $produit->setContent($faker->text);
                $produit->setPriceHt($faker->numberBetween($min = 1000, $max = 30000));
                $produit->setPriceTtc($faker->numberBetween($min = 1000, $max = 30000));
                $produit->setQuantity($faker->numberBetween(0, 50));

                $manager->persist($produit);

            }
        }
        $manager->flush();
    }
}