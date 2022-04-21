<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * Medicament
 *
 * @ORM\Table(name="medicament")
  * @ORM\Entity
 * @ApiResource()
 */
class Medicament
{
    /**
     * @var int
     *
     * @ORM\Column(name="idMedicament", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idmedicament;

    /**
     * @var string
     *
     * @ORM\Column(name="nomCommercial", type="string", length=50, nullable=false)
     */
    private $nomcommercial;

    /**
     * @var string|null
     *
     * @ORM\Column(name="composition", type="string", length=50, nullable=true)
     */
    private $composition;

    /**
     * @var string|null
     *
     * @ORM\Column(name="effetsIndesirables", type="string", length=100, nullable=true)
     */
    private $effetsindesirables;

    /**
     * @var string|null
     *
     * @ORM\Column(name="contreIndications", type="string", length=100, nullable=true)
     */
    private $contreindications;

    /**
     * @var string
     *
     * @ORM\Column(name="prixEchantillon", type="decimal", precision=10, scale=0, nullable=false)
     */
    private $prixechantillon;

    /**
     * @var \Famille
     *
     * @ORM\ManyToOne(targetEntity="Famille")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idFamille", referencedColumnName="idFamille")
     * })
     */
    private $idfamille;
    public function getIdMedicament(): ?int
    {
        return $this->idmedicament;
    }

    public function getNomcommercial(): ?string
    {
        return $this->nomcommercial;
    }

    public function setNomcommercial(string $nomcommercial): self
    {
        $this->nomcommercial = $nomcommercial;

        return $this;
    }

    public function getComposition(): ?string
    {
        return $this->composition;
    }

    public function setComposition(?string $composition): self
    {
        $this->composition = $composition;

        return $this;
    }

    public function getEffetsindesirables(): ?string
    {
        return $this->effetsindesirables;
    }

    public function setEffetsindesirables(?string $effetsindesirables): self
    {
        $this->effetsindesirables = $effetsindesirables;

        return $this;
    }

    public function getContreindications(): ?string
    {
        return $this->contreindications;
    }

    public function setContreindications(?string $contreindications): self
    {
        $this->contreindications = $contreindications;

        return $this;
    }

    public function getPrixechantillon(): ?string
    {
        return $this->prixechantillon;
    }

    public function setPrixechantillon(string $prixechantillon): self
    {
        $this->prixechantillon = $prixechantillon;

        return $this;
    }

    public function getIdfamille(): ?Famille
    {
        return $this->idfamille;
    }

    public function setIdfamille(?Famille $idfamille): self
    {
        $this->idfamille = $idfamille;

        return $this;
    }
    public function __toString() {
        return $this->nomcommercial;
    }


}
