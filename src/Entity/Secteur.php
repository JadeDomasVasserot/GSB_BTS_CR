<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * Secteur
 *
 * @ORM\Table(name="secteur")
  * @ORM\Entity
 * @ApiResource()
 */
class Secteur
{
    /**
     * @var int
     *
     * @ORM\Column(name="idSecteur", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idsecteur;

    /**
     * @var string
     *
     * @ORM\Column(name="secLib", type="string", length=20, nullable=false)
     */
    private $seclib;
    public function getIdSecteur(): ?int
    {
        return $this->idsecteur;
    }

    public function getSeclib(): ?string
    {
        return $this->seclib;
    }

    public function setSeclib(string $seclib): self
    {
        $this->seclib = $seclib;

        return $this;
    }
    public function __toString() {
        return $this->seclib;
    }

}
