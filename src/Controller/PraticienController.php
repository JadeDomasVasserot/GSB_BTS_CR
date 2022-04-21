<?php

namespace App\Controller;
use App\Entity\Praticien;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
/**
 * @Route("/praticien")
 */
class PraticienController extends AbstractController
{
    /**
     * @Route("/", name="app_home_praticien")
     * affiche la page home
     */
    public function index()
    {
        return $this->render('Praticien/index.html.twig');
    }
    /**
     * @Route("/liste", name="app_liste_praticien")
     * affiche la page home
     */
    public function liste()
    {
        return $this->render('Praticien/liste.html.twig');
    }
  
}