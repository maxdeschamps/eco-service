<?php

namespace App\Controller;

use App\Entity\Bill;
use App\Entity\Message;
use App\Entity\Product;
use App\Entity\User;
use App\Repository\BillRepository;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AdminController as BaseAdminController;

class AdminController extends BaseAdminController
{
    /**
     * @Route("/dashboard", name="admin_dashboard")
     */
    public function index(EntityManagerInterface $em)
    {
        $repository = $em->getRepository(Bill::class);
        $bills = $repository->findAll();
        $countBills=count($bills);


        $repository = $em->getRepository(Product::class);
        $products = $repository->findAll();
        $countProducts=count($products);

        $repository = $em->getRepository(User::class);
        $users = $repository->findAll();
        $countUsers=count($users);

        $repository = $em->getRepository(Message::class);
        $messages = $repository->findAll();
        $countMessages=count($messages);

        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
            'countBills' => $countBills,
            'countProducts' => $countProducts,
            'countUsers' => $countUsers,
            'countMessages' => $countMessages
        ]);
    }
}

