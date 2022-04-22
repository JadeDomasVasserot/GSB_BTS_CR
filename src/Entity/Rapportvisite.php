<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Rapportvisite
 *
 * @ORM\Table(name="rapportvisite")
  * @ORM\Entity
 * @ApiResource()
 */
class Rapportvisite
{
    /**
     * @var int
     *
     * @ORM\Column(name="idRapportVisite", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idrapportvisite;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateVisite", type="date", nullable=false)
     */
    private $datevisite;

    /**
     * @var bool
     *
     * @ORM\Column(name="estRemplacant", type="boolean", nullable=false)
     */
    private $estremplacant;

    /**
     * @var string
     *
     * @ORM\Column(name="bilan", type="string", length=200, nullable=false)
     */
    private $bilan;

    /**
     * @var \Motif
     *
     * @ORM\ManyToOne(targetEntity="Motif")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idMotif", referencedColumnName="idMotif", nullable=false)
     * })
     */
    private $idMotif;
    
    /**
     * @var string
     *
     * @ORM\Column(name="motifText", type="string", length=25, nullable=true)
     */
    private $motifText;
    /**
     * @var \Visiteur
     *
     * @ORM\ManyToOne(targetEntity="Visiteur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idVisiteur", referencedColumnName="id", nullable=false)
     * })
     */
    private $idVisiteur;

    /**
     * @var \Praticien
     *
     * @ORM\ManyToOne(targetEntity="Praticien")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idPraticien", referencedColumnName="idPraticien", nullable=false)
     * })
     */
    private $idPraticien;
     /**
     * @var \Praticien
     *
     * @ORM\ManyToOne(targetEntity="Praticien")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idRemplacant", referencedColumnName="idPraticien", nullable=true)
     * })
     */
    private $idRemplacant;
    public function getIdRapportvisite(): ?int
    {
        return $this->idrapportvisite;
    }

    public function getDatevisite(): ?\DateTime
    {
        return $this->datevisite;
    }

    public function setDatevisite(\DateTime $datevisite): self
    {
        $this->datevisite = $datevisite;

        return $this;
    }

    public function getEstremplacant(): ?bool
    {
        return $this->estremplacant;
    }

    public function setEstremplacant(bool $estremplacant): self
    {
        $this->estremplacant = $estremplacant;

        return $this;
    }

    public function getBilan(): ?string
    {
        return $this->bilan;
    }

    public function setBilan(string $bilan): self
    {
        $this->bilan = $bilan;

        return $this;
    }

    public function getIdmotif(): ?Motif
    {
        return $this->idMotif;
    }

    public function setIdmotif(Motif $idMotif): self
    {
        $this->idMotif = $idMotif;

        return $this;
    }
    public function getMotiftext(): ?string
    {
        return $this->motifText;
    }

    public function setMotiftext(string $motifText): self
    {
        $this->motifText = $motifText;

        return $this;
    }

    public function getIdvisiteur(): ?Visiteur
    {
        return $this->idvisiteur;
    }

    public function setIdvisiteur(Visiteur $idVisiteur): self
    {
        $this->idVisiteur = $idVisiteur;

        return $this;
    }

    public function getIdpraticien(): ?Praticien
    {
        return $this->idPraticien;
    }

    public function setIdpraticien(Praticien $idPraticien): self
    {
        $this->idPraticien = $idPraticien;

        return $this;
    }
    public function getIdremplacant(): ?Praticien
    {
        return $this->idRemplacant;
    }

    public function setIdremplacant(Praticien $idRemplacant): self
    {
        $this->idRemplacant = $idRemplacant;

        return $this;
    }

}
