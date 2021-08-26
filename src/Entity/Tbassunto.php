<?php

namespace App\Entity;

use App\Repository\AssuntoRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Tbassunto
 *
 * @ORM\Table(name="tbassunto", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"idAssunto"})}, indexes={@ORM\Index(name="fk_tb_assunto_tb_assunto_idx", columns={"idAssuntoPai"})})
 * @ORM\Entity(repositoryClass=AssuntoRepository::class)
 */
class Tbassunto
{
    /**
     * @var int
     *
     * @ORM\Column(name="idAssunto", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idassunto;

    /**
     * @var string
     *
     * @ORM\Column(name="assunto", type="string", length=45, nullable=false)
     */
    private $assunto;

    /**
     * @var \Tbassunto
     *
     * @ORM\ManyToOne(targetEntity="Tbassunto")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idAssuntoPai", referencedColumnName="idAssunto")
     * })
     */
    private $idassuntopai;


    public function getIdassunto(): ?int
    {
        return $this->idassunto;
    }

    public function getAssunto(): ?string
    {
        return $this->assunto;
    }

    public function setAssunto(string $assunto): self
    {
        $this->assunto = $assunto;

        return $this;
    }

    public function getIdassuntopai(): ?self
    {
        return $this->idassuntopai;
    }

    public function setIdassuntopai(?self $idassuntopai): self
    {
        $this->idassuntopai = $idassuntopai;

        return $this;
    }

    public function __toString() {
        return $this->assunto;
    }



}
