<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController
{
    /**
     * @Route("/accueil", name="app_accueil", methods={"GET"})
     */
    public function index(): Response
    {
        //$nom="Jean-Joseph";
        /*$age= 17;*/
        $nomsStudents= ['jean-joseph','jean-patrick','jean-claude','jean-kévin'];
        return $this->render('accueil/index.html.twig', [
            //'controller_name' => 'AccueilController',
           // 'leNom' => $nom
        'lesNoms' =>  $nomsStudents,
        ]);
    }
}
