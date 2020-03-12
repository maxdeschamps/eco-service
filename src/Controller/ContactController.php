<?php
// src/Controller/ContactController.php
namespace App\Controller;

use App\Entity\Message;
use App\Form\MessageType;
use App\Notifications\ContactNotification;
use Doctrine\ORM\EntityManagerInterface;
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
    public function index(Request $request, ContactNotification $notification, EntityManagerInterface $manager): Response
    {
        $contact = new Message();
        $form = $this->createForm(MessageType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $notification->notify($contact);
            $manager->persist($contact);
            $manager->flush();
            $this->addFlash('success', 'Votre email à bien été envoyé');
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
