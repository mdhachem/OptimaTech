<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Notifications\ContactNotification;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        return $this->render('home/index.html.twig');
    }

    /**
     * @Route("/contact", name="contact")
     */
    public function contact(Request $request, ContactNotification $contactNotification)
    {
        $contact = new Contact();
        $contact->setCreatedAt(new \DateTime());
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $contactNotification->notify($contact);
            return $this->redirectToRoute('contact');
        }

        return $this->render('home/contact.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/project", name="project")
     */
    public function project()
    {
        return $this->render('home/project.html.twig');
    }


    /**
     * @Route("/services", name="services")
     */
    public function services()
    {
        return $this->render('home/services.html.twig');
    }

    /**
     * @Route("/about-us", name="about_us")
     */
    public function aboutUs()
    {
        return $this->render('home/about-us.html.twig');
    }

}
