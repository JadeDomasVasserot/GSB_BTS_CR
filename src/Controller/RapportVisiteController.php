<?php

namespace App\Controller;
use App\Entity\Rapportvisite;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
/**
 * @Route("/rapportvisite")
 */
class RapportVisiteController extends AbstractController
{
    /**
     * @Route("/", name="app_rapport")
     * affiche la page Rapport de visite
     */
    public function index()
    {
        return $this->render('rapportVisite.html.twig');
    }

}