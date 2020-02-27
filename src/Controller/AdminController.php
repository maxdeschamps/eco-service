<?php

namespace App\Controller;

<<<<<<< HEAD
use App\Entity\Bill;
use App\Entity\Contact;
use App\Entity\Message;
use App\Entity\Product;
use App\Entity\Quotation;
use App\Entity\User;
use App\Form\ContactType;
use App\Notifications\ContactNotification;
use Doctrine\ORM\EntityManagerInterface;
use Dompdf\Dompdf;
use Dompdf\Options;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AdminController as BaseAdminController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
=======
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AdminController as BaseAdminController;
>>>>>>> f934b38db53d7f0c9ad66a0549e2f828e6fbb4cf

class AdminController extends BaseAdminController
{
    /**
     * @Route("/dashboard", name="admin_dashboard")
     */
<<<<<<< HEAD
    public function index(EntityManagerInterface $em, ContactNotification $notification, Request $request): Response
    {
        $repository = $em->getRepository(Bill::class);
        $bills = $repository->findAll();
        $countBills = count($bills);

        $repository = $em->getRepository(Product::class);
        $products = $repository->findAll();
        $countProducts = count($products);

        $repository = $em->getRepository(User::class);
        $users = $repository->findAll();
        $countUsers = count($users);

        $repository = $em->getRepository(Message::class);
        $messages = $repository->findAll();
        $countMessages = count($messages);

        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $notification->notify($contact);
            $this->addFlash('success', 'Votre email à bien été envoyé');
            return $this->redirectToRoute('admin_dashboard', [
                'controller_name' => 'AdminController',
                'countBills' => $countBills,
                'countProducts' => $countProducts,
                'countUsers' => $countUsers,
                'countMessages' => $countMessages,
                'form' => $form->createView()
            ]);
        }
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
            'countBills' => $countBills,
            'countProducts' => $countProducts,
            'countUsers' => $countUsers,
            'countMessages' => $countMessages,
            'form' => $form->createView()
        ]);
    }

    public function downloadQuotationAction()
    {
        $id = $this->request->query->get('id');
        $quotation = $this->em->getRepository(Quotation::class)->find($id);

        $pdfOptions = new Options();
        $pdfOptions->set('defaultFont', 'Arial');

        $dompdf = new Dompdf($pdfOptions);

        $html = $this->render('/quotation/invoice.html.twig', [
            'title' => "Détail du devis",
            'quotation' => $quotation
        ]);

        $dompdf->loadHtml($html);

        $dompdf->setPaper('A4', 'portrait');

        $dompdf->render();

        $output = $dompdf->output();

        $publicDirectory = $this->get('kernel')->getProjectDir() . '/public/uploads/fichiers/devis';
        $pdfFilepath = $publicDirectory . '/bill.pdf';

        file_put_contents($pdfFilepath, $output);

        $dompdf->stream("bill.pdf", [
            "Attachment" => false
        ]);

    }

    public function downloadBillAction()
    {
        $id = $this->request->query->get('id');
        $bill = $this->em->getRepository(Bill::class)->find($id);

        $pdfOptions = new Options();
        $pdfOptions->set('defaultFont', 'Arial');

        $dompdf = new Dompdf($pdfOptions);

        $html = $this->render('/bill/bill.html.twig', [
            'title' => "Détail du devis",
            'bill' => $bill
        ]);

        $dompdf->loadHtml($html);

        $dompdf->setPaper('A4', 'portrait');

        $dompdf->render();

        $output = $dompdf->output();

        $publicDirectory = $this->get('kernel')->getProjectDir() . '/public/uploads/fichiers/devis';
        $pdfFilepath = $publicDirectory . '/bill.pdf';

        file_put_contents($pdfFilepath, $output);

        $dompdf->stream("bill.pdf", [
            "Attachment" => false
        ]);

    }
=======
    public function index()
    {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }
>>>>>>> f934b38db53d7f0c9ad66a0549e2f828e6fbb4cf
}

