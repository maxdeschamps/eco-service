<?php

namespace App\DataFixtures;


use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class ManyProductFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');
        $populator = new \Faker\ORM\Propel\Populator($faker);

        for ($i = 0; $i < 50; $i++) {
            $produit = new Product();
            $produit->addEntity('User', 1);
            $produit->setName($faker->word(7));
            $produit->setSlug($faker->word(10));
            $produit->setContent($faker->text);
            $produit->setPriceHt($faker->numberBetween($min = 1000, $max = 30000));
            $produit->setPriceTtc($faker->numberBetween($min = 1000, $max = 30000));
            $produit->setQuantity($faker->numberBetween(0,50));
            $manager->persist($produit);
        }
        $manager->flush();
    }
}
