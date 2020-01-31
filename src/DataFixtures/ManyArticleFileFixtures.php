<?php
namespace App\DataFixtures;

use App\Entity\Article;
use App\Entity\ArticleFile;
use App\Entity\Category;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class ManyArticleFileFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');

        for ($i = 0; $i < 50; $i++) {
            $article = new Article();

        }
        $manager->flush();
    }
}