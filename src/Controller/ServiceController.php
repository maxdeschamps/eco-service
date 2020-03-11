<?php
// src/Controller/ServiceController.php
namespace App\Controller;

use App\Entity\Service;
use App\Form\ServiceSearchType;
use App\Form\ServiceType;
use App\Data\SearchData;

use App\Repository\ServiceRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Knp\Component\Pager\PaginatorInterface;

class ServiceController extends AbstractController
{
    private $serviceRepository;
    private $entityManager;

    public function __construct(ServiceRepository $serviceRepository, EntityManagerInterface $entityManager)
    {
        $this->serviceRepository = $serviceRepository;
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/services", name="index_service")
     */
     public function index(Request $request, PaginatorInterface $paginator, ServiceRepository $repository): Response
     {
         $data = new SearchData();
         $form = $this->createForm(ServiceSearchType::class, $data);
         $form->handleRequest($request);
         [$min, $max] = $repository->finMinMax($data);

         $services = $repository->findAllVisibleQuery($data);

         $pagination = $paginator->paginate(
             $services,
             $request->query->getInt('page', 1),
             $request->query->getInt('limit', 6)
         );

         return $this->render(
           'service/index.html.twig',
           [
               'services' => $pagination,
               'form' => $form->createView(),
               'min' => $min,
               'max' =>$max
           ]
         );
    }

    /**
     * @Route("/service/{id}", name="show_service")
     */
    public function show(Service $service)
    {
        $services = $this->serviceRepository->findLastsServices();

        return $this->render(
            'service/show.html.twig',
            [
              'service' => $service,
              'services' => $services
            ]
        );
    }
}
