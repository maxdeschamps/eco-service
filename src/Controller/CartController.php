<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use App\Repository\ProductRepository;
use App\Repository\ServiceRepository;
use App\Entity\Product;
use App\Entity\Service;
use App\Entity\Bill;
use App\Entity\ProductBill;
use App\Entity\Quotation;
use App\Entity\ServiceQuotation;
use App\Form\AddressesType;
use Doctrine\ORM\EntityManagerInterface;

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
     * @Route("/panier/adresses/", name="choose_addresses")
     */
    public function indexAddresses(SessionInterface $session, Request $request)
    {
      if (isset($_GET['extra'])) {
        $extra = json_decode($_GET['extra']);
        $session->set('extra', $extra->text);
      }

      $user = $this->getUser();

      $form = $this->createForm(AddressesType::class, $user);
      $form->handleRequest($request);

      if ($form->isSubmitted() && $form->isValid()) {
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($user);
        $entityManager->flush();

        $this->addFlash('success', 'Vos adresses ont bien été enregistrées !');

        return $this->redirectToRoute('choose_addresses');
      }

      return $this->render('cart/addresses.html.twig', [
        'form' => $form->createView(),
      ]);
    }

    /**
     * @Route("/panier/commande-enregistree/", name="success")
     */
    public function successQuote(SessionInterface $session, EntityManagerInterface $manager)
    {
      $panier = $session->get('panier', []);

      $panierWithData = [];

      if ($this->getUser()->getIsCompany() == 0) {

        foreach (($panier) as $id => $quantity) {
          $panierWithData[] = [
            'product' => $this->getDoctrine()->getRepository(Product::class)->find($id),
            'quantity' => $quantity
          ];
        }
        // création de la facture
        $bill = new Bill();
        $bill->setRequestDate(new \DateTime('now'))
          ->setApproved(0)
          ->setEmail($this->getUser()->getEmail())
          ->setNumTva(20)
          ->setRef(time())
          ->setDeliveryAddress($this->getUser()->getDeliveryAddress())
          ->setBillingAddress($this->getUser()->getBillingAddress())
          ->setCustomer($this->getUser());

        foreach ($panierWithData as $item) {
          $productBill = new ProductBill();
          $productBill->setQuantity( $item['quantity'])
            ->setProduct($item['product']);
          $bill->addProductBill($productBill);
        }
        $manager->persist($bill);
        $manager->flush();


      } else {

        foreach (($panier) as $id => $quantity) {
          $panierWithData[] = [
            'service' => $this->getDoctrine()->getRepository(Service::class)->find($id),
            'quantity' => $quantity
          ];
        }
        // creation du devis
        $quote = new Quotation();
        $quote->setRequestDate(new \DateTime('now'))
          ->setApproved(0)
          ->setEmail($this->getUser()->getEmail())
          ->setRef(time())
          ->setNumTva(20)
          ->setDeliveryAddress($this->getUser()->getDeliveryAddress())
          ->setBillingAddress($this->getUser()->getBillingAddress())
          ->setExtra($session->get('extra'))
          ->setCompany($this->getUser());

        foreach ($panierWithData as $item) {
          $serviceQuotation = new ServiceQuotation();
          $serviceQuotation->setQuantity( $item['quantity'])
            ->setService($item['service']);
          $quote->addServiceQuotation($serviceQuotation);
        }
        $manager->persist($quote);
        $manager->flush();

        $session->set('extra', '');
      }

      $session->set('panier', []);

      return $this->render('cart/success.html.twig', [

      ]);
    }

    // /**
    // * @Route("/panier/editQuantity/{id}", name="cart_editQuanity")
    // */
    // public function editQuantity($id, SessionInterface $Session)
    // {
    //   $panier = $session->get('panier', []);
    //
    //   if (!empty($panier[$id]))
    //   {
    //     $panier[$id] = $request->query->get('quantity');
    //     $this->addFlash('success', 'Quantité modifié avec succès !');
    //   }
    //   $session->set('panier', $panier);
    //
    //   return $this->redirectToRoute("cart_index");
    //
    // }

}
