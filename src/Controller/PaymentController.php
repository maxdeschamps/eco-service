<?php

namespace App\Controller;

use App\Entity\Payment;
use App\Form\PaymentType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class PaymentController extends AbstractController
{
    /**
     * @Route("/paiement", name="payment")
     */
    public function index(Request $request, EntityManagerInterface $manager)
    {
        $payment = new Payment();
        $form = $this->createForm(PaymentType::class, $payment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $manager->persist($payment);
            $manager->flush();
            $this->addFlash('success', 'Votre Paiement à bien été effectué');
            return $this->redirectToRoute('success');
        }

        return $this->render(
            'cart/payment.html.twig',
            [
                'form' => $form->createView()
            ]
        );
    }
}
