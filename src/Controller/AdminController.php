<?php

namespace App\Controller;

use App\Entity\Bill;
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

        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
            'bills' => $bills
        ]);
    }
}

