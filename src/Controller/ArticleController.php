<?php
// src/Controller/ArticleController.php
namespace App\Controller;

use App\Entity\Article;
use App\Form\ArticleType;
use App\Repository\ArticleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
  /**
   * @Route("/articles", name="index_article")
   */
  public function index(EntityManagerInterface $em)
  {
    $repository = $em->getRepository(Article::class);
    $articles = $repository->findAll();

    return $this->render(
      'article/index.html.twig',
       ['articles' => $articles]
    );
  }

  /**
   * @Route("/article/{slug}", name="show_article")
   */
  public function show(Article $article)
  {
    return $this->render(
      'article/show.html.twig',
      ['article' => $article]
    );
  }
}
