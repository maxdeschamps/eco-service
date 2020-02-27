<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UserController extends AbstractController
{
  /**
   * @Route("/mon-compte", name="profile_index")
   */
  public function profile()
  {
    return $this->render(
      'user/index.html.twig'
    );
  }

  /**
   * @Route("/mon-compte/editer", name="profile_update")
   */
  public function updateUserAccountForm(Request $request)
  {
    $user = $this->getUser();

    $form = $this->createForm(UserType::class, $user);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
      $entityManager = $this->getDoctrine()->getManager();
      $entityManager->persist($user);
      $entityManager->flush();

      return $this->redirectToRoute('profile_index');
    }

    return $this->render('user/update.html.twig', [
      'user' => $user,
      'form' => $form->createView(),
    ]);

  }
}
