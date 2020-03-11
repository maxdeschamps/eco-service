<?php
// src/Controller/HomepageController.php
namespace App\Controller;

use App\Entity\Product;
use App\Form\ProductType;

use App\Repository\ProductRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomepageController extends AbstractController
{
  /**
   * @Route("/", name="homepage")
   */
  public function index()
  {

    $em=$this->getDoctrine()->getManager();

    // On récupère tous les produits
    $products = $em->getRepository(Product::class)->findLastsProducts();

    return $this->render('homepage/index.html.twig',
      [
        'products' => $products
      ]
    );
  }

}
