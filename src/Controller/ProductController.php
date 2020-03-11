<?php
// src/Controller/ProductController.php
namespace App\Controller;

use App\Entity\Product;
use App\Form\ProductSearchType;
use App\Form\ProductType;
use App\Data\SearchData;

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
    public function index(Request $request, PaginatorInterface $paginator, ProductRepository $repository): Response
    {
        $data = new SearchData();
        $form = $this->createForm(ProductSearchType::class, $data);
        $form->handleRequest($request);
        [$min, $max] = $repository->finMinMax($data);

        $products = $repository->findAllVisibleQuery($data);

        $pagination = $paginator->paginate(
            $products,
            $request->query->getInt('page', 1),
            $request->query->getInt('limit', 6)
        );

        return $this->render(
          'product/index.html.twig',
          [
              'products' => $pagination,
              'form' => $form->createView(),
              'min' => $min,
              'max' =>$max
          ]
        );
    }


    /**
     * @Route("/produit/{id}", name="show_product")
     */
    public function show(Product $product)
    {
        return $this->render(
            'product/show.html.twig',
            ['product' => $product]
        );
    }
}
