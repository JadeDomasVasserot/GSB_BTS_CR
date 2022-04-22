<?php

namespace App\Controller;
use App\Entity\Visiteur;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
/**
 * @Route("/visiteur")
 */
class VisiteurController extends AbstractController
{
    /**
     * @Route("/", name="app_home_visiteur")
     * affiche la page home pour voir le profil du visiteur
     */
    public function profil(SessionInterface $session)
    {
        $currentVisiteur =$session->get('id');
        
        return $this->render('Visiteur/profilVisiteur.html.twig');
    }
      /**
     * @Route("/session", name="currentUser")
     */
    public function session(SessionInterface $session){

        if($session != null){

            $visiteur = $this->getDoctrine()
            ->getRepository(Visiteur::class)
            ->findOneBy([
               'id' => $session->get('id'),
            ]);
            $response = new Response();


            $response->setContent(json_encode(['id'=> $visiteur->getId(),
                                                'nom' => $visiteur->getNom(),
                                                'prenom' =>$visiteur->getPrenom(),
                                                'mdp' => $visiteur->getMdp(),
                                                'login' => $visiteur->getLogin(),
                                                'adresse' => $visiteur->getAdresse(),
                                                'cp' => $visiteur->getCp(),
                                                'ville' => $visiteur->getVille(),
                                                'labo' => $visiteur->getIdlaboratoire(),
                                                'secteur' => $visiteur->getIdsecteur(),
                                                'dateEmbauche' => $visiteur->getDateembauche(),
                                                ]));

            $response->headers->set('Content-Type', 'application/json');
            return $response;
        }
        else
        {
            return $this->render('Home/erreur404.html.twig');

        }
    }
     /**
     * @Route("/liste", name="app_liste_visiteur")
     * affiche la liste des collègues visiteurs
     */
    public function liste()
    {
        return $this->render('Visiteur/liste.html.twig');
    }
    /**
     * @Route("/index", name="app_choix_visiteur")
     * permet de choisir son visiteur
     */
    public function choixVisiteur()
    {
        return $this->render('Visiteur/index.html.twig');
    }
  
}