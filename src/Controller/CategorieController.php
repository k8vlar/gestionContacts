<?php

namespace App\Controller;

use App\Repository\CategorieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategorieController extends AbstractController
{
    /**
     * @Route("/categories", name="categories", methods={"GET"})
     */
    public function listeCategories(CategorieRepository $repo): Response
    {   $categories = $repo->findAll();
        return $this->render('categorie/categories.html.twig', [
            'controller_name' => 'CategorieController',
            'lesCategories' => $categories,
        ]);
    }
       /**
         * @Route("/ficheCategorie/{id}", name="ficheCategorie", methods={"GET"})
         */
        public function ficheCategorie($id, CategorieRepository $repo): Response
        {
        $categories = $repo->find($id);
        return $this->render('categorie/ficheCategorie.html.twig', ['categorie'=>$categories]);
        }
}
