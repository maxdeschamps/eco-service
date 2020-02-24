<?php

namespace App\Controller;

use App\Entity\Bill;
use App\Entity\Message;
use App\Entity\Product;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Dompdf\Dompdf;
use Dompdf\Options;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AdminController as BaseAdminController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

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

    public function downloadBillAction(){
        $id = $this->request->query->get('id');
        $bill = $this->em->getRepository(Bill::class)->find($id);

        $pdfOptions = new Options();
        $pdfOptions->set('defaultFont', 'Arial');

        // Instantiate Dompdf with our options
        $dompdf = new Dompdf($pdfOptions);

        $html = $this->render('/bill/invoice.html.twig', [
            'title' => "Détail du devis",
            'bill'=> $bill
        ]);

        $dompdf->loadHtml($html);

        $dompdf->setPaper('A4', 'portrait');

        $dompdf->render();

        $output = $dompdf->output();

        $publicDirectory = $this->get('kernel')->getProjectDir() . '/public/uploads/fichiers/devis';
        $pdfFilepath =  $publicDirectory . '/bill.pdf';

        file_put_contents($pdfFilepath, $output);

        $dompdf->stream("bill.pdf", [
            "Attachment" => false
        ]);

    }
}

