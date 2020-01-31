<?php
// src/Controller/ServiceController.php
namespace App\Controller;

use App\Entity\Service;
use App\Form\ServiceType;
use App\Repository\ServiceRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ServiceController extends AbstractController
{
  /**
   * @Route("/services", name="index_service")
   */
  public function index(EntityManagerInterface $em)
  {
    $repository = $em->getRepository(Service::class);
    $services = $repository->findAll();

    return $this->render(
      'service/index.html.twig',
       ['services' => $services]
    );
  }

  /**
   * @Route("/service/{slug}", name="show_service")
   */
  public function show(Service $service)
  {
    return $this->render(
      'service/show.html.twig',
      ['service' => $service]
    );
  }
}
