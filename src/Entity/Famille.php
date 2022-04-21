<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
/**
 * Famille
 *
 * @ORM\Table(name="famille")
    * @ORM\Entity
 * @ApiResource()
 */
class Famille
{
    /**
     * @var int
     *
     * @ORM\Column(name="idFamille", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idfamille;

    /**
     * @var string
     *
     * @ORM\Column(name="famLib", type="string", length=25, nullable=false)
     */
    private $famlib;
    public function getIdFamille(): ?int
    {
        return $this->idfamille;
    }

    public function getFamlib(): ?string
    {
        return $this->famlib;
    }

    public function setFamlib(string $famlib): self
    {
        $this->famlib = $famlib;

        return $this;
    }
    public function __toString() {
        return $this->famlib;
    }

}
