<?php

namespace App\Controller;

use App\Entity\Contacts;
use App\Repository\ContactsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="app_contact", methods={"GET"})
     */
    public function listeContacts(ContactsRepository $repo): Response
    {   
        #{ $manager = $this->getDoctrine()->getManager();
       #{ $repo = $manager ->getRepository(Contacts::class);
        $contacts = $repo->findAll();
        //dump($contacts);
        // On récupère le contenu de la page "Contact" en BDD (avec Doctrine)

        

        return $this->render('contact/listeContacts.html.twig', [
            'controller_name' => 'ContactController',
            'contacts' => $contacts,
        ]);
    }
    /**
         * @Route("/contact/{id}", name= "contact", methods={"GET"})
         */
        public function ficheContact($id, ContactsRepository $repo): Response
        {
        $contact = $repo->find($id);
        return $this->render('contact/ficheContact.html.twig', ['contact'=>$contact]);
        }
}