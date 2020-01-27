<?php

namespace App\Form;

use App\Entity\Product;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductType extends AbstractType
{
    public function new(Request $request)
    {
      // just setup a fresh $task object (remove the example data)
      $product = new Product();

      $form = $this->createForm(ProductType::class, $product);

      $form->handleRequest($request);
      if ($form->isSubmitted() && $form->isValid()) {
        // $form->getData(); // holds the submitted values
        $product = $form->getData();

        // ... perform some action, such as saving the task to the database
        // for example, if Task is a Doctrine entity, save it!
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($task);
        $entityManager->flush();

        return $this->redirectToRoute('task_success');
      }

      return $this->render('product/create.html.twig', [
        'form' => $form->createView(),
      ]);
    }
}
