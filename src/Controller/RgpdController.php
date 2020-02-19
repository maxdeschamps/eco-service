<?php
// src/Controller/RgpdController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class RgpdController extends AbstractController
{
  /**
   * @Route("/RGPD", name="rgpd_index")
   */
  public function index()
  {
    return $this->render(
      'rgpd/index.html.twig'
    );
  }
}
