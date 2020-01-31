<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
  /**
   * @Route("/utilisateurs", name="index_user")
   */
  public function index(EntityManagerInterface $em)
  {
    $repository = $em->getRepository(User::class);
    $user = $repository->findAll();

    return $this->render(
      'user/index.html.twig',
       ['user' => $user]
    );
  }

  /**
   * @Route("/utilisateur/{slug}", name="show_user")
   */
  public function show(User $user)
  {
    return $this->render(
      'user/show.html.twig',
      ['user' => $user]
    );
  }
}
