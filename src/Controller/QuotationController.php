<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class QuotationController extends AbstractController
{
    /**
     * @Route("/quotation", name="quotation")
     */
    public function index()
    {
        return $this->render('quotation/index.html.twig', [
            'controller_name' => 'QuotationController',
        ]);
    }
}
