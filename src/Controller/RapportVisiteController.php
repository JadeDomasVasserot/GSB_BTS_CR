<?php

namespace App\Controller;

use App\Entity\Rapportmedicament;
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
     * affiche la page Rapport de visite pour créer
     */
    public function index()
    {
        return $this->render('Rapportvisite/rapportVisite.html.twig');
    }

    /**
     * @Route("/new", name="app_rapport_new", methods={"POST"})
     * créer un  Rapport de visite ezt ajout en bdd
     */
    public function new(SessionInterface $session)
    {
        $rapport = new Rapportvisite();
        $rapportMedicament = new Rapportmedicament();
        // $rapport->setIdvisiteur($session->get('id'));
        $dateVisite = $_POST["RAP_DATEVISITE"];
        $rapport->setDateVisite($dateVisite);
        $bilan = $_POST["RAP_BILAN"];
        $rapport->setBilan($bilan);
        $motif = $_POST["RAP_MOTIF"];
        $rapport->setIdmotif($motif);
        if ($motif == "Autre") {
            $motifTxt = $_POST["RAP_MOTIFAUTRE"];
            $rapport->setMotiftext($motifTxt);
        }
      
        if (isset($_POST["PRA_REMPLACANT"])) {
            $isRempla = true;
            $remplacant = $_POST["PRA_REMPLACANT"];
            $rapport->setIdpraticien($remplacant);
        } else {
            $idPraticien = $_POST["PRA_NUM"];
            $rapport->setIdpraticien($idPraticien);
        }
        $produit1 = $_POST["PROD1"];
   
        $produit2 = $_POST["PROD2"];
        if (isset($_POST["RAP_DOC"])) {
            $doc = true;
        }
        $echantillon1 = $_POST["PRA_ECH1"];
        $quantite1 = $_POST["PRA_QTE1"];
        if (isset($_POST["PRA_ECH2"]) && isset($_POST["PRA_QTE2"])) {
            $echantillon2 = $_POST["PRA_ECH2"];
            $quantite2 = $_POST["PRA_QTE2"];
        }
        if (isset($_POST["PRA_ECH2"]) && isset($_POST["PRA_QTE2"])) {
            $echantillon2 = $_POST["PRA_ECH2"];
            $quantite2 = $_POST["PRA_QTE2"];
        }

    }
     /**
     * @Route("/show/list", name="app_rapport_show_list", methods={"GET"})
     * créer API récupérer les rapports d'un visiteur connecté
     */
    public function show(SessionInterface $session)
    {
        try {
        $idUser = $session->get('id');
        $rapports = $this->getDoctrine()
        ->getRepository(Rapportvisite::class)
        ->join
        ->findBy([
            'idVisiteur' => $idUser, 
        ]);
        
        } catch (\Exception $err)
        {
            return $this->render('Home/erreur404.html.twig');
        }
        $rapportsTab = array();
        
        foreach($rapports as $rapp)
        {
            $id =  $rapp->getIdRapportvisite();
            $dateVisite = $rapp->getDatevisite();
            $estRemplacant = $rapp->getEstremplacant();
            $bilan = $rapp->getBilan();
            $idMotif = $rapp->getIdmotif();
            if($rapp->getIdmotif() == "Autre"){
                $motifText = $rapp->getMotiftext();
            }
            else{
                $motifText ="";
            }
            $idPraticien = $rapp->getIdpraticien();
            $rapp = array(
                'id' => $id,
                'dateVisite' => $dateVisite,
                'estRemplacant' => $estRemplacant,
                'bilan' => $bilan,
                'idMotif' => $idMotif,    
                'motifText' => $motifText,
                'idPraticien' => $idPraticien,

            );

            array_push($rapportsTab, $rapp);
        }
                
        $response = new Response();
        $response->setContent(json_encode([$rapportsTab]));
        $response->headers->set('Content-Type', 'application/json');

        return $response; 

     

    }
    /**
     * @Route("/show", name="app_rapport_show", methods={"GET"})
     * page show pour voir ses cr
     */
    public function showPage(SessionInterface $session)
    {
        return $this->render('Rapportvisite/show.html.twig');

    }
}
