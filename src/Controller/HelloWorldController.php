<?php
// src/Controller/HelloWorldController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HelloWorldController extends AbstractController
{
  /**
   * @Route("/")
   */
  public function index()
  {
    return $this->render(
      'helloworld/index.html.twig'
      // ['project' => $project]
    );
  }
}
