<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * Praticien
 *
 * @ORM\Table(name="praticien")
  * @ORM\Entity
 * @ApiResource()
 */
class Praticien
{
    /**
     * @var int
     *
     * @ORM\Column(name="idPraticien", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idpraticien;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=20, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=20, nullable=false)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=50, nullable=false)
     */
    private $adresse;

    /**
     * @var int
     *
     * @ORM\Column(name="cp", type="integer", nullable=false)
     */
    private $cp;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=15, nullable=false)
     */
    private $ville;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="dateEmbauche", type="date", nullable=true)
     */
    private $dateembauche;

    /**
     * @var string
     *
     * @ORM\Column(name="coefNotoriete", type="decimal", precision=10, scale=0, nullable=false)
     */
    private $coefnotoriete;

    /**
     * @var \Lieu
     *
     * @ORM\ManyToOne(targetEntity="Lieu")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="lieuExercice", referencedColumnName="idLieu")
     * })
     */
    private $idlieu;

    public function getIdPraticien(): ?int
    {
        return $this->idpraticien;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getCp(): ?int
    {
        return $this->cp;
    }

    public function setCp(int $cp): self
    {
        $this->cp = $cp;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getDateembauche(): ?\DateTimeInterface
    {
        return $this->dateembauche;
    }

    public function setDateembauche(?\DateTimeInterface $dateembauche): self
    {
        $this->dateembauche = $dateembauche;

        return $this;
    }

    public function getCoefnotoriete(): ?string
    {
        return $this->coefnotoriete;
    }

    public function setCoefnotoriete(string $coefnotoriete): self
    {
        $this->coefnotoriete = $coefnotoriete;

        return $this;
    }

    public function getLieuexercice(): ?Lieu
    {
        return $this->lieuexercice;
    }

    public function setLieuexercice(string $lieuexercice): self
    {
        $this->lieuexercice = $lieuexercice;

        return $this;
    }
    public function __toString() {
        return $this->nom;
    }

}
