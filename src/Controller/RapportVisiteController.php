<?php

namespace App\Controller;

use App\Entity\Medicament;
use App\Entity\Motif;
use App\Entity\Praticien;
use App\Entity\Rapportmedicament;
use App\Entity\Rapportvisite;
use App\Entity\Visiteur;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
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
     * Ajout dans RapportVisite et dans RapportMedicament
     */
    public function newRapport(SessionInterface $session, EntityManagerInterface $entityManager)
    {
        // création d'un nouveau rapport de visite
        $rapport = new Rapportvisite();
        $entityManager = $this->getDoctrine()->getManager();
        //on cherche l'user selon l'id de la session
        $user = $this->getDoctrine()
        ->getRepository(Visiteur::class)
        ->findOneBy([
            'id' => $session->get('id'),
        ]);
        // on ajoute l'user correspondant à la création du rapport
        $rapport->setIdvisiteur($user);
        $dateVisite = $_POST["RAP_DATEVISITE"];
        $date = new \DateTime($dateVisite);
        $rapport->setDatevisite($date);
        $bilan = $_POST["RAP_BILAN"];
        $rapport->setBilan($bilan);
        $motif = $_POST["RAP_MOTIF"];
        // On ajoute les informations grâce aux setters et en récupérant les variables POST
        // On cherche le motif selectionné par rapport à la variable POST
        $motifSearch = $this->getDoctrine()
        ->getRepository(Motif::class)
        ->findOneBy([
            'idmotif' => $motif,
        ]);
        // on ajoute le motif qui correspond au rapport
        $rapport->setIdmotif($motifSearch);
        if ($motif === "Autre") {
            $motifTxt = $_POST["RAP_MOTIFAUTRE"];
            $rapport->setMotiftext($motifTxt);
        }
        // Si le rapport à un remplaçant on cherche le praticien qui correspond à la variable POST 
        if (isset($_POST["PRA_REMPLACANT"])) {
            $remplacant = $_POST["PRA_REMPLACANT"];
            $praticienRempla = $this->getDoctrine()
            ->getRepository(Praticien::class)
            ->findOneBy([
                'idpraticien' => $remplacant,
            ]);
            // on set qu'il est remplaçant et on set le remplaçant
            $rapport->setEstremplacant(true);
            $rapport->setIdremplacant($praticienRempla);
        } 
        else{
            // sinon on dit qu'il n'y a pas de remplaçant
            $rapport->setEstremplacant(false);
        }
        // on ajoute en cherchant le praticien selon la variable POST obtenue
        $idPraticien = $_POST["PRA_NUM"];
        $praticien = $this->getDoctrine()
        ->getRepository(Praticien::class)
        ->findOneBy([
            'idpraticien' => $idPraticien,
        ]);
        $rapport->setIdpraticien($praticien);
        // on ajoute l'entité rapport créée à la BDD
        $entityManager->persist($rapport);
        $entityManager->flush();
        // Si Produit1 est détecté et pas == null alors je créer un nouveau Rapportmedicament
        if (isset($_POST["PROD1"])&& $_POST["PROD1"] !== "NULL") {
            $rapportMedicament1 = new Rapportmedicament();
            $entityManager = $this->getDoctrine()->getManager();
            $produit1 = $_POST["PROD1"];
            $rapportMedicament1->setEstechantillon(false);
            // Je mets la variable estEchantillon à faux et je recherche le médicament selon la variable Post
            $medicament = $this->getDoctrine()
            ->getRepository(Medicament::class)
            ->findOneBy([
                'idmedicament' => $produit1,
            ]);
            $rapportMedicament1->setIdmedicament($medicament);
            $rapportMedicament1->setEstpresente(true);
            // Je dis que c'est un médicament qui a été présenté et j'ajoute l'id du rapport qui a été créé juste au dessus
            $rapportMedicament1->setIdrapport($rapport);
             // on ajoute l'entité rapport créée à la BDD
            $entityManager->persist($rapportMedicament1);
            $entityManager->flush();
        }
         // Si Produit2 est détecté et pas == null alors je créer un nouveau Rapportmedicament
        if (isset($_POST["PROD2"])&& $_POST["PROD2"] !== "NULL") {
            $rapportMedicament2 = new Rapportmedicament();
            $entityManager = $this->getDoctrine()->getManager();
            $produit2 = $_POST["PROD2"];
            $rapportMedicament2->setEstechantillon(false);
            // Je mets la variable estEchantillon à faux et je recherche le médicament selon la variable Post
            $medicament = $this->getDoctrine()
            ->getRepository(Medicament::class)
            ->findOneBy([
                'idmedicament' => $produit2,
            ]);
            $rapportMedicament2->setIdmedicament($medicament);
            $rapportMedicament2->setEstpresente(true);
             // Je dis que c'est un médicament qui a été présenté et j'ajoute l'id du rapport qui a été créé juste au dessus
            $rapportMedicament2->setIdrapport($rapport);
             // on ajoute l'entité rapport créée à la BDD
            $entityManager->persist($rapportMedicament2);
            $entityManager->flush();
        }
         // Si echantillon1 est détecté et pas == null alors je créer un nouveau Rapportmedicament
        if (isset($_POST["PRA_ECH1"]) && isset($_POST["PRA_QTE1"])&& $_POST["PRA_ECH1"] !== "NULL") {
            $rapportMedicament3 = new Rapportmedicament();
            $entityManager = $this->getDoctrine()->getManager();
            $echantillon1 = $_POST["PRA_ECH1"];
            $quantite1 = (int)$_POST["PRA_QTE1"];
            $rapportMedicament3->setQuantite( $quantite1);
            $rapportMedicament3->setEstechantillon(true);
            $rapportMedicament3->setEstpresente(false);            
            $medicament = $this->getDoctrine()
            ->getRepository(Medicament::class)
            ->findOneBy([
                'idmedicament' => $echantillon1,
            ]);
             // Je dis que c'est un médicament qui a été donnée en échantillon  et non présenté et j'ajoute l'id du rapport qui a été créé juste au dessus
            $rapportMedicament3->setIdrapport($rapport);
            $rapportMedicament3->setIdmedicament($medicament);
             // on ajoute l'entité rapport créée à la BDD
            $entityManager->persist($rapportMedicament3);
            $entityManager->flush();
        }
         // Si echantillon2 est détecté et pas == null alors je créer un nouveau Rapportmedicament
        if (isset($_POST["PRA_ECH2"]) && isset($_POST["PRA_QTE2"])&& $_POST["PRA_ECH2"] !== "NULL") {
            $rapportMedicament4 = new Rapportmedicament();
            $entityManager = $this->getDoctrine()->getManager();
            $echantillon2 = $_POST["PRA_ECH2"];
            $quantite2 = (int)$_POST["PRA_QTE2"];
            $rapportMedicament4->setQuantite($quantite2);
            $rapportMedicament4->setEstechantillon(true);
            $rapportMedicament4->setEstpresente(false);
            $medicament = $this->getDoctrine()
            ->getRepository(Medicament::class)
            ->findOneBy([
                'idmedicament' => $echantillon2,
            ]);
            // Je dis que c'est un médicament qui a été donnée en échantillon et non présenté et j'ajoute l'id du rapport qui a été créé juste au dessus
            $rapportMedicament4->setIdmedicament($medicament);
            $rapportMedicament4->setIdrapport($rapport);
             // on ajoute l'entité rapport créée à la BDD
            $entityManager->persist($rapportMedicament4);
            $entityManager->flush();
        }
       return $this->render('Rapportvisite/show.html.twig');

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
            $id = $rapp->getIdRapportvisite();
            $dateVisite = $rapp->getDatevisite();
            $estRemplacant = $rapp->getEstremplacant();
            $bilan = $rapp->getBilan();
            $idMotif = $rapp->getIdmotif()->getMotiflib();
            
            if($rapp->getIdmotif() == "Autre"){
                $motifText = $rapp->getMotiftext();
            }
            else{
                $motifText ="";
            }
            $nomPraticien = $rapp->getIdpraticien()->getNom();
            $prenomPraticien = $rapp->getIdpraticien()->getPrenom();
            if($rapp->getIdremplacant() != null){
            $nomRemplacant = $rapp->getIdremplacant()->getNom();
            $prenomRemplacant = $rapp->getIdremplacant()->getPrenom();
            }
            else{
                $nomRemplacant = null;
                $prenomRemplacant = null;
            }

            $rapp = array(
                'id' => $id,
                'dateVisite' => $dateVisite,
                'estRemplacant' => $estRemplacant,
                'bilan' => $bilan,
                'idMotif' => $idMotif,    
                'motifText' => $motifText,
                'nomPraticien' => $nomPraticien,
                'prenomPraticien' =>$prenomPraticien,
                'nomRemplacant' => $nomRemplacant,
                'prenomRemplacant' =>$prenomRemplacant,
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
     /**
     * @Route("/voirProduits/{id}", name="app_rapport_show_product", methods={"GET"})
     * page pour les infos des produits du rapport
     */
    public function showPageProduct(int $id)
    {

        $rapportsTabMedi = array();
        $rapportsMedi = $this->getDoctrine()
        ->getRepository(Rapportmedicament::class)
        ->findBy([
            'idRapport' => $id, 
        ]);
        foreach($rapportsMedi as $rappMedi){
            $id = $rappMedi->getIdrapport()->getIdRapportvisite();
            $quantite = $rappMedi->getQuantite();
            $estEchantillon = $rappMedi->getEstechantillon();
            $estPresente = $rappMedi->getEstpresente();
            $nomMedica = $rappMedi->getIdmedicament()->getNomcommercial();
            $rappMediTab = array(
                'id' => $id,
                'quantite' => $quantite,
                'estEchantillon' => $estEchantillon,
                'estPresente' => $estPresente,
                'nomMedica' => $nomMedica,    
                'idRapport' => $id,
            );
            array_push($rapportsTabMedi, $rappMediTab);
        }        
        $response = new Response();
        $response->setContent(json_encode([$rapportsTabMedi]));
        $response->headers->set('Content-Type', 'application/json');

        return $response; 

    }
}
