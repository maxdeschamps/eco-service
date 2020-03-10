<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Quotation;
use App\Entity\Bill;
use App\Form\UserType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class UserController extends AbstractController
{

  /**
   * @Route("/mon-compte", name="profile_index")
   */
  public function profile()
  {
    if ($this->denyAccessUnlessGranted('ROLE_USER')) {
      if ($this->getLoggedUser()->getIsCompany() == 0) {
        $repository = $em->getRepository(Bill::class);
        $summary = $repository->findAll();
      } else {
        $repository = $em->getRepository(Quotation::class);
        $summary = $repository->findAll();
      }
    } else {
      $summary = [];
    }

    return $this->render(
      'user/index.html.twig',
      [
        'summaries' => $summary,
      ]
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

  /**
   * @Route("/deconnexion", name="app_logout")
   */
  public function logout()
  {
      throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
  }

  // /**
  //  * @Route("/mes-commandes/{ref}", name="show_summary")
  //  */
  // public function showSummary(Service $service)
  // {
  //   return $this->render(
  //     'service/show.html.twig',
  //     ['service' => $service]
  //   );
  // }
}
