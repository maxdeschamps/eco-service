<?php
namespace App\DataFixtures;

use App\Entity\File;
use App\Entity\Product;
use App\Entity\ProductFile;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class ManyProductFileFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');

        for ($i = 0; $i < 50; $i++) {
            $productFile = new ProductFile();
            $productFile->setFile($manager->getRepository(File::class)->find(1));
            $productFile->setProduct($manager->getRepository(Product::class)->find(1));
            $manager->persist($productFile);
        }
        $manager->flush();
    }
}