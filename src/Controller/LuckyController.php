<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class LuckyController extends AbstractController
{
  /**
   * @Route("/lucky-number")
   */
  public function number()
  {
    $number = random_int(0, 100);

    return new Response(
      '<html><head><title>Lucky Number</title></head></heade><body>Lucky number: '.$number.'</body></html>'
    );
  }
}
