<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use App\Entity\Product;
use App\Form\ProductType;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
  /**
   * @Route("/products", name="index_product")
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
   * @Route("/product/{slug}", name="show_product")
   */
  public function show(Product $product)
  {
    return $this->render(
      'product/show.html.twig',
      ['product' => $product]
    );
  }

  /**
   * @Route("/product", name="create_product")
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

    return $this->render('product/create.html.twig', [
      'product' => $product,
      'form' => $form->createView(),
    ]);
  }
}
