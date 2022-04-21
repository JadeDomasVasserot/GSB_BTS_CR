<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * Laboratoire
 *
 * @ORM\Table(name="laboratoire")
  * @ORM\Entity
 * @ApiResource()
 */
class Laboratoire
{
    /**
     * @var int
     *
     * @ORM\Column(name="idLaboratoire", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idlaboratoire;

    /**
     * @var string
     *
     * @ORM\Column(name="laboLib", type="string", length=20, nullable=false)
     */
    private $labolib;
    public function getIdLaboratoire(): ?int
    {
        return $this->idlaboratoire;
    }

    public function getLabolib(): ?string
    {
        return $this->labolib;
    }

    public function setLabolib(string $labolib): self
    {
        $this->labolib = $labolib;

        return $this;
    }
    public function __toString() {
        return $this->labolib;
    }

}
