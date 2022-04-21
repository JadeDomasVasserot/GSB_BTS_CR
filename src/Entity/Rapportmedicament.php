<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * Rapportmedicament
 *
 * @ORM\Table(name="rapportmedicament", indexes={@ORM\Index(name="idMedicamentFK", columns={"idMedicament"}), @ORM\Index(name="idRapportFK", columns={"idRapport"})})
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
     * @ORM\Column(name="quantite", type="integer", nullable=false)
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
     * @ORM\Column(name="estDocumente", type="boolean", nullable=false)
     */
    private $estdocumente;

    /**
     * @var \Medicament
     *
     * @ORM\ManyToOne(targetEntity="Medicament")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idMedicament", referencedColumnName="idMedicament")
     * })
     */
    private $idmedicament;

    /**
     * @var \Rapportvisite
     *
     * @ORM\ManyToOne(targetEntity="Rapportvisite")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idRapport", referencedColumnName="idRapportVisite")
     * })
     */
    private $idrapport;
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

    public function getEstdocumente(): ?bool
    {
        return $this->estdocumente;
    }

    public function setEstdocumente(bool $estdocumente): self
    {
        $this->estdocumente = $estdocumente;

        return $this;
    }

    public function getIdmedicament(): ?Medicament
    {
        return $this->idmedicament;
    }

    public function setIdmedicament(?Medicament $idmedicament): self
    {
        $this->idmedicament = $idmedicament;

        return $this;
    }

    public function getIdrapport(): ?Rapportvisite
    {
        return $this->idrapport;
    }

    public function setIdrapport(?Rapportvisite $idrapport): self
    {
        $this->idrapport = $idrapport;

        return $this;
    }


}
