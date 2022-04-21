<?php

namespace App\Controller;
use App\Entity\Medicament;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
/**
 * @Route("/medicament")
 */
class MedicamentController extends AbstractController
{
    /**
     * @Route("/", name="app_home_medicament")
     * affiche la page home
     */
    public function index()
    {
        return $this->render('Medicament/index.html.twig');
    }
    /**
     * @Route("/liste", name="app_liste_medicament")
     * affiche la page home
     */
    public function liste()
    {
        return $this->render('Medicament/liste.html.twig');
    }
  
  
}