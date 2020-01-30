<?php
namespace App\DataFixtures;

use App\Entity\Article;
use App\Entity\ArticleFile;
use App\Entity\Category;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class ManyArticleFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');

        for ($i = 0; $i < 50; $i++) {
            $article = new Article();
            $article->addArticleFile($manager->getRepository(ArticleFile::class)->find(1));
            $article->setAuthor($manager->getRepository(User::class)->find(1));
            $article->setCategory($manager->getRepository(Category::class)->find(1));
            $article->setName($faker->word(10));
            $article->setSlug($faker->word(7));
            $article->setContent($faker->text);
            $manager->persist($article);
        }
        $manager->flush();
    }
}