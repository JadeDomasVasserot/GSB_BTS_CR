<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Rapportmedicament
 *
 * @ORM\Table(name="rapportmedicament")
  * @ORM\Entity
 * @ApiResource()
 */
class Rapportmedicament
{
    /**
     * @var int
     *
     * @ORM\Column(name="idRapportMedi", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idrapportmedi;

    /**
     * @var int
     *
     * @ORM\Column(name="quantite", type="integer", nullable=true)
     */
    private $quantite;

    /**
     * @var bool
     *
     * @ORM\Column(name="estEchantillon", type="boolean", nullable=false)
     */
    private $estechantillon;
     /**
     * @var bool
     *
     * @ORM\Column(name="estPresente", type="boolean", nullable=false)
     */
    private $estpresente;
    /**
     * @var \Medicament
     *
     * @ORM\ManyToOne(targetEntity="Medicament")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idMedicament", referencedColumnName="idMedicament")
     * })
     */
    private $idMedicament;

    /**
     * @var \Rapportvisite
     *
     * @ORM\ManyToOne(targetEntity="Rapportvisite")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idRapport", referencedColumnName="idRapportVisite")
     * })
     */
    private $idRapport;
    public function getIdRapportmedi(): ?int
    {
        return $this->idrapportmedi;
    }

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): self
    {
        $this->quantite = $quantite;

        return $this;
    }

    public function getEstechantillon(): ?bool
    {
        return $this->estechantillon;
    }

    public function setEstechantillon(bool $estechantillon): self
    {
        $this->estechantillon = $estechantillon;

        return $this;
    }
    public function getEstpresente(): ?bool
    {
        return $this->estpresente;
    }

    public function setEstpresente(bool $estpresente): self
    {
        $this->estpresente = $estpresente;

        return $this;
    }
    public function getIdmedicament(): ?Medicament
    {
        return $this->idMedicament;
    }

    public function setIdmedicament(Medicament $idMedicament): self
    {
        $this->idMedicament = $idMedicament;

        return $this;
    }

    public function getIdrapport(): ?Rapportvisite
    {
        return $this->idRapport;
    }

    public function setIdrapport(Rapportvisite $idRapport): self
    {
        $this->idRapport = $idRapport;

        return $this;
    }
}
