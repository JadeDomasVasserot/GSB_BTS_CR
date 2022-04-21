<?php

namespace App\Controller;
use App\Entity\Visiteur;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
/**
 * @Route("/")
 */
class HomeController extends AbstractController
{
    /**
     * @Route("/", name="app_home")
     * affiche la page home
     */
    public function index()
    {
        return $this->render('Home/home.html.twig');
    }
    /**
     * @Route("/connexion", name="app_connexion", methods="POST")
     * connecte l'utilisateur
     */
    public function authentification(Request $request, SessionInterface $session)
    {
        try{
            $login = $_POST["inputUser"];
            $password = $_POST["inputPassword"];
            $user = $this->getDoctrine()
                ->getRepository(Visiteur::class)
                ->findOneBy([
                    'login' => $login,
                ]);
            if($user != null && $password =  $user->getMdp() && $login =  $user->getLogin()){
                $id = $user->getId();
                $nom = $user->getNom();
                $prenom = $user->getPrenom();
                $adresse = $user->getAdresse();
                $cp = $user->getCp();
                $ville = $user->getVille();
                $dateEmbauche = $user->getDateembauche();

                    $session->set('id',$id);
                    $session->set('nom',$nom);
                    $session->set('prenom',$prenom);
                    $session->set('adresse',$adresse);
                    $session->set('cp',$cp);
                    $session->set('ville',$ville);
                    $session->set('dateEmbauche',$dateEmbauche);
                  
                    $response = new Response();
                    $response->setContent(json_encode(['id'=> $id,
                                                        'nom' => $nom,
                                                        'prenom' => $prenom,
                                                        'adresse' => $adresse,
                                                        'cp' => $cp,
                                                        'ville' => $ville,
                                                        'dateEmbauche' => $dateEmbauche,
                                                        ]));

                    $response->headers->set('Content-Type', 'application/json');
                    return $this->render('Home/menu.html.twig');
                }
            else
            {
                return $this->render('Home/erreurConnexion.html.twig');

            }
        }   
        catch (\Exception $err)
        {
            return $this->render('Home/erreur404.html.twig');
        }
    }
     /**
     * @Route("/deconnexion", name="deconnexion")
     */
    public function deconnexion(SessionInterface $session){

        if($session->get('id' != null))
        {
            $session->clear();
        }
        return $this->render('Home/deconnexion.html.twig');     
    }
}