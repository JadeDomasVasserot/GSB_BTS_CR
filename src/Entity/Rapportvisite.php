<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

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
     *   @ORM\JoinColumn(name="idMotif", referencedColumnName="idMotif")
     * })
     */
    private $idMotif;
    
    /**
     * @var string
     *
     * @ORM\Column(name="motifText", type="string", length=25, nullable=false)
     */
    private $motiftext;
    /**
     * @var \Visiteur
     *
     * @ORM\ManyToOne(targetEntity="Visiteur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idVisiteur", referencedColumnName="id")
     * })
     */
    private $idVisiteur;

    /**
     * @var \Praticien
     *
     * @ORM\ManyToOne(targetEntity="Praticien")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idPraticien", referencedColumnName="idPraticien")
     * })
     */
    private $idPraticien;
    public function getIdRapportvisite(): ?int
    {
        return $this->idrapportvisite;
    }

    public function getDatevisite(): ?\DateTimeInterface
    {
        return $this->datevisite;
    }

    public function setDatevisite(\DateTimeInterface $datevisite): self
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

    public function setIdmotif(string $idMotif): self
    {
        $this->idMotif = $idMotif;

        return $this;
    }
    public function getMotiftext(): ?string
    {
        return $this->motifText;
    }

    public function setMotiftext(string $motiftext): self
    {
        $this->motifText = $motiftext;

        return $this;
    }

    public function getIdvisiteur(): ?Visiteur
    {
        return $this->idvisiteur;
    }

    public function setIdvisiteur(string $idVisiteur): self
    {
        $this->idVisiteur = $idVisiteur;

        return $this;
    }

    public function getIdpraticien(): ?Praticien
    {
        return $this->idPraticien;
    }

    public function setIdpraticien(string $idPraticien): self
    {
        $this->idPraticien = $idPraticien;

        return $this;
    }

}
