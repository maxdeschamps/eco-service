<?php
// src/Controller/ContactController.php
namespace App\Controller;

use App\Entity\Message;
use App\Form\MessageType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Symfony\Component\PropertyAccess\PropertyAccess;
use Knp\Component\Pager\PaginatorInterface;

class ContactController extends AbstractController
{
  /**
   * @Route("/contact", name="contact")
   */
  public function index(Request $request)
  {
    $contact = new Message();
    $form = $this->createForm(MessageType::class, $contact);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid())
    {
      $this->addFlash('success', 'Votre message à a bien été envoyé');
      return $this->redirectToRoute('contact');
    }

    return $this->render(
      'contact/index.html.twig',
      [
        'form' => $form->createView()
      ]
    );
  }
}
