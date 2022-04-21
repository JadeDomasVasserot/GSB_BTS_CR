<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * Motif
 *
 * @ORM\Table(name="motif")
  * @ORM\Entity
 * @ApiResource()
 */
class Motif
{
    /**
     * @var int
     *
     * @ORM\Column(name="idMotif", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idmotif;

    /**
     * @var string
     *
     * @ORM\Column(name="motifLib", type="string", length=25, nullable=false)
     */
    private $motiflib;
    public function getIdMotif(): ?int
    {
        return $this->idmotif;
    }

    public function getMotiflib(): ?string
    {
        return $this->motiflib;
    }

    public function setMotiflib(string $motiflib): self
    {
        $this->motiflib = $motiflib;

        return $this;
    }
    public function __toString() {
        return $this->motiflib;
    }

}
