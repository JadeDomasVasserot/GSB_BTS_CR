<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * Lieu
 *
 * @ORM\Table(name="lieu")
  * @ORM\Entity
 * @ApiResource()
 */
class Lieu
{
    /**
     * @var int
     *
     * @ORM\Column(name="idLieu", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idlieu;

    /**
     * @var string
     *
     * @ORM\Column(name="lieuexercice", type="string", length=20, nullable=false)
     */
    private $lieuexercice;
    public function getIdLieu(): ?int
    {
        return $this->idlieu;
    }

    public function getLieuexercice(): ?string
    {
        return $this->lieuexercice;
    }

    public function setLieuexercice(string $lieuexercice): self
    {
        $this->lieuexercice = $lieuexercice;

        return $this;
    }
    public function __toString() {
        return $this->lieuexercice;
    }

}
