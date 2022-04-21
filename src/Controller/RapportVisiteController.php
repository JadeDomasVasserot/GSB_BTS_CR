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
     * affiche la page Rapport de visite
     */
    public function index()
    {
        return $this->render('Rapportvisite/rapportVisite.html.twig');
    }

    /**
     * @Route("/new", name="app_rapport_new", methods={"POST"})
     * créer un  Rapport de visite
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
}
