<?php
namespace App\Notifications;

use App\Entity\Contact;
use Twig\Environment;

class ContactNotification {

    public function __construct(\Swift_Mailer $mailer, Environment $renderer)
    {
        $this->mailer = $mailer;
        $this->renderer = $renderer;
    }

    public function notify(Contact $contact){
        $message = (new \Swift_Message('Admin: '. $contact->getFirstname()))
            ->setFrom($contact->getEmail())
            ->setTo('eco-service@gmail.com')
            ->setReplyTo($contact->getEmail())
            ->setBody($this->render('emails/contact.html.twig', [
              'contact' => $contact
        ]), 'text/html');

        $this->mailer->send($message);
    }
}