<?php
namespace App\Notifications;

use App\Entity\Message;
use Twig\Environment;

class ContactNotification {

    /**
     * @var \Swift_Mailer
     */
    private $mailer;

    /**
     * @var Environment
     */
    private $renderer;

    public function __construct(\Swift_Mailer $mailer, Environment $renderer)
    {
        $this->mailer = $mailer;
        $this->renderer = $renderer;
    }

    public function notify(Message $messages){
        $message = (new \Swift_Message('Eco-Service[Admin]: '. $messages->getSubject()))
            ->setFrom($messages->getEmail())
            ->setTo('eco-service@site.fr')
            ->setReplyTo($messages->getEmail())
            ->setBody($this->renderer->render('contact/template-mail.html.twig', [
              'messages' => $messages
        ]), 'text/html');

        $this->mailer->send($message);
    }
}
