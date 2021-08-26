<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tbbanca
 *
 * @ORM\Table(name="tbbanca")
 * @ORM\Entity
 */
class Tbbanca
{
    /**
     * @var int
     *
     * @ORM\Column(name="idBanca", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idbanca;

    /**
     * @var string
     *
     * @ORM\Column(name="nomeBanca", type="string", length=45, nullable=false)
     */
    private $nomebanca;

    public function getIdbanca(): ?int
    {
        return $this->idbanca;
    }

    public function getNomebanca(): ?string
    {
        return $this->nomebanca;
    }

    public function setNomebanca(string $nomebanca): self
    {
        $this->nomebanca = $nomebanca;

        return $this;
    }

    public function __toString() {
        return $this->nomebanca;
    }


}
