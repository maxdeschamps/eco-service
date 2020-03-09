<?php
// src/Controller/ArticleController.php
namespace App\Controller;

use App\Entity\Article;
use App\Form\ArticleType;
use App\Form\ArticleSearchType;
use App\Data\SearchData;

use App\Repository\ArticleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Knp\Component\Pager\PaginatorInterface;

class ArticleController extends AbstractController
{
  private $articleRepository;
  private $entityManager;

  public function __construct(ArticleRepository $articleRepository, EntityManagerInterface $entityManager)
  {
    $this->articleRepository = $articleRepository;
    $this->entityManager = $entityManager;
  }
  /**
   * @Route("/articles", name="index_article")
   */
  public function index(Request $request, PaginatorInterface $paginator,  ArticleRepository $repository)
  {
    $data = new SearchData();
    $form = $this->createForm(ArticleSearchType::class, $data);
    $form->handleRequest($request);

    $articles = $repository->findAllVisibleQuery($data);

    $pagination = $paginator->paginate(
        $articles,
        $request->query->getInt('page', 1),
        $request->query->getInt('limit', 6)
    );

    return $this->render(
      'article/index.html.twig',
      [
          'articles' => $pagination,
          'form' => $form->createView(),
      ]
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
