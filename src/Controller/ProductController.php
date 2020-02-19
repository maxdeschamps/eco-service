<?php
// src/Controller/ProductController.php
namespace App\Controller;

use App\Entity\Product;
use App\Entity\ProductSearch;
use App\Form\ProductSearchType;
use App\Form\ProductType;

use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Knp\Component\Pager\PaginatorInterface;

class ProductController extends AbstractController
{

    private $productRepository;
    private $entityManager;

    public function __construct(ProductRepository $productRepository, EntityManagerInterface $entityManager)
    {
        $this->productRepository = $productRepository;
        $this->entityManager = $entityManager;
    }

  /**
   * @Route("/produits", name="index_product")
   */
  public function index(EntityManagerInterface $em)
  {
    $repository = $em->getRepository(Product::class);
    $products = $repository->findAll();

    return $this->render(
      'product/index.html.twig',
       ['products' => $products]
    );
  }

  /**
   * @Route("/produit/{slug}", name="show_product")
   */
  public function show(Product $product)
  {
    return $this->render(
      'product/show.html.twig',
      ['product' => $product]
    );
  }

  /**
   * @Route("/produit", name="create_product")
   */
  public function create(Request $request): Response
  {
    $product = new Product();
    $form = $this->createForm(ProductType::class, $product);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
      $entityManager = $this->getDoctrine()->getManager();
      $entityManager->persist($product);
      $entityManager->flush();

      return $this->redirectToRoute('index_product');
      
    }
  }
    /**
     * @Route("/products", name="index_product")
     */
    public function index(Request $request, PaginatorInterface $paginator): Response
    {
        $productSearch = new ProductSearch();
        $form = $this->createForm(ProductSearchType::class, $productSearch);
        $form->handleRequest($request);

        $products = $this->productRepository->findAllVisibleQuery($productSearch);

        $pagination = $paginator->paginate(
            $products,
            $request->query->getInt('page', 1),
            $request->query->getInt('limit', 6)
        );

        return $this->render(
          'product/index.html.twig',
          [
              'products' => $pagination,
              'form' => $form->createView()
          ]
        );
    }


    /**
     * @Route("/product/{slug}", name="show_product")
     */
    public function show(Product $product)
    {
        return $this->render(
            'product/show.html.twig',
            ['product' => $product]
        );
    }
}
