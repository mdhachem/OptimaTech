<?php
namespace App\Notifications;

use App\Entity\Contact;
use Twig\Environment;


class ContactNotification
{

    private $mailer;

    private $renderer;

    public function __construct(\Swift_Mailer $mailer, Environment $renderer)
    {
        $this->mailer = $mailer;
        $this->renderer = $renderer;
    }

    public function notify(Contact $contact)
    {
        $message = (new \Swift_Message('Subject : ' . $contact->getSubject()))
            ->setFrom($contact->getEmail())
            ->setTo('contact@optimatech-group.com')
            ->setBody($this->renderer->render('email/contact.html.twig', [
                'contact' => $contact
            ]), 'text/html');

        if ($this->mailer->send($message)) {
            echo '[SWIFTMAILER] sent email to ' . $contact->getEmail();
        } else {
            echo '[SWIFTMAILER] not sending email: ';
        }


    }
}