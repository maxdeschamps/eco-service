<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use App\Repository\ProductRepository;
use App\Repository\ServiceRepository;

class CartController extends AbstractController
{
    /**
     * @Route("/panier", name="cart_index")
     */
    public function index(SessionInterface $session, ProductRepository $ProductRepository)
    {
      $panier = $session->get('panier', []);

      $panierWithData = [];

      foreach (($panier) as $id => $quantity) {
        $panierWithData[] = [
          'product' => $ProductRepository->find($id),
          'quantity' => $quantity
        ];
      }

      $total = 0;

      foreach ($panierWithData as $item) {
        $totalItem = $item['product']->getPriceTtc() * $item['quantity'];
        $total += $totalItem;
      }

      return $this->render('cart/index.html.twig', [
        'items' => $panierWithData,
        'total' => $total
      ]);
    }

    /**
    * @Route("/panier/add/{id}/{qte}", name="cart_add")
    */
    public function add($id, $qte, SessionInterface $session)
    {
      $panier = $session->get('panier', []);

      if(!empty($panier[$id]))
        $panier[$id]+=$qte;
      else {
        $panier[$id] = 0;
        $panier[$id]+=$qte;
      }
      $session->set('panier', $panier);

      if ($this->getUser() && $this->getUser()->getIsCompany() == 1) {
        return $this->redirectToRoute("cart_company_index");
      } else {
        return $this->redirectToRoute("cart_index");
      }
    }

    /**
    * @Route("/panier/remove/{id}", name="cart_remove")
    */
    public function remove($id,  SessionInterface $session)
    {
      $panier = $session->get('panier', []);

      if(!empty($panier[$id]))
      {
        unset($panier[$id]);
        $this->addFlash('success', 'Article supprimé avec succès !');
      }
      $session->set('panier', $panier);

      if ($this->getUser() && $this->getUser()->getIsCompany() == 1) {
        return $this->redirectToRoute("cart_company_index");
      } else {
        return $this->redirectToRoute("cart_index");
      }
    }

    /**
     * @Route("/demande-de-devis", name="cart_company_index")
     */
    public function indexCompany(SessionInterface $session, ServiceRepository $serviceRepository)
    {
      $panier = $session->get('panier', []);

      $panierWithData = [];

      foreach (($panier) as $id => $quantity) {
        $panierWithData[] = [
          'service' => $serviceRepository->find($id),
          'quantity' => $quantity
        ];
      }

      $total = 0;

      foreach ($panierWithData as $item) {
        $totalItem = $item['service']->getPriceTtc() * $item['quantity'];
        $total += $totalItem;
      }

      return $this->render('cart/indexCompany.html.twig', [
        'items' => $panierWithData,
        'total' => $total
      ]);
    }

    /**
    * @Route("/panier/editQuantity/{id}", name="cart_editQuanity")
    */
    public function editQuantity($id, SessionInterface $Session)
    {
      $panier = $session->get('panier', []);

      if (!empty($panier[$id]))
      {
        $panier[$id] = $request->query->get('quantity');
        $this->addFlash('success', 'Quantité modifié avec succès !');
      }
      $session->set('panier', $panier);

      return $this->redirectToRoute("cart_index");

    }

}
