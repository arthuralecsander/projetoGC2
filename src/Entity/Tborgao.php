<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tborgao
 *
 * @ORM\Table(name="tborgao")
 * @ORM\Entity
 */
class Tborgao
{
    /**
     * @var int
     *
     * @ORM\Column(name="idOrgao", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idorgao;

    /**
     * @var string
     *
     * @ORM\Column(name="nomeOrgao", type="string", length=45, nullable=false)
     */
    private $nomeorgao;

    public function getIdorgao(): ?int
    {
        return $this->idorgao;
    }

    public function getNomeorgao(): ?string
    {
        return $this->nomeorgao;
    }

    public function setNomeorgao(string $nomeorgao): self
    {
        $this->nomeorgao = $nomeorgao;

        return $this;
    }

    public function __toString() {
        return $this->nomeorgao;
    }



}
