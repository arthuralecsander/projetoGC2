<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tbquestao
 *
 * @ORM\Table(name="tbquestao", indexes={@ORM\Index(name="fk_tb_questao_tb_assunto1_idx", columns={"tbAssuntoId"}), @ORM\Index(name="fk_tb_questao_tb_banca1_idx", columns={"tbBancaId"}), @ORM\Index(name="fk_tb_questao_tb_orgao1_idx", columns={"tbOrgaoId"})})
 * @ORM\Entity
 */
class Tbquestao
{
    /**
     * @var int
     *
     * @ORM\Column(name="idQuestao", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idquestao;

    /**
     * @var string
     *
     * @ORM\Column(name="questao", type="string", length=255, nullable=false)
     */
    private $questao;

    /**
     * @var \Tbassunto
     *
     * @ORM\ManyToOne(targetEntity="Tbassunto")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tbAssuntoId", referencedColumnName="idAssunto")
     * })
     */
    private $tbassuntoid;

    /**
     * @var \Tbbanca
     *
     * @ORM\ManyToOne(targetEntity="Tbbanca")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tbBancaId", referencedColumnName="idBanca")
     * })
     */
    private $tbbancaid;

    /**
     * @var \Tborgao
     *
     * @ORM\ManyToOne(targetEntity="Tborgao")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tbOrgaoId", referencedColumnName="idOrgao")
     * })
     */
    private $tborgaoid;

    public function getIdquestao(): ?int
    {
        return $this->idquestao;
    }

    public function getQuestao(): ?string
    {
        return $this->questao;
    }

    public function setQuestao(string $questao): self
    {
        $this->questao = $questao;

        return $this;
    }

    public function getTbassuntoid(): ?Tbassunto
    {
        return $this->tbassuntoid;
    }

    public function setTbassuntoid(?Tbassunto $tbassuntoid): self
    {
        $this->tbassuntoid = $tbassuntoid;

        return $this;
    }

    public function getTbbancaid(): ?Tbbanca
    {
        return $this->tbbancaid;
    }

    public function setTbbancaid(?Tbbanca $tbbancaid): self
    {
        $this->tbbancaid = $tbbancaid;

        return $this;
    }

    public function getTborgaoid(): ?Tborgao
    {
        return $this->tborgaoid;
    }

    public function setTborgaoid(?Tborgao $tborgaoid): self
    {
        $this->tborgaoid = $tborgaoid;

        return $this;
    }

    #public function __toString() {
    #    return $this->name;
    #}


}
