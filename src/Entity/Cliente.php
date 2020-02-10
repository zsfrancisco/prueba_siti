<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ClienteRepository")
 */
class Cliente
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $doc_cli;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom_cli;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ape_cli;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Direccion", mappedBy="id_cli")
     */
    private $direccions;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Pedido", mappedBy="id_cli")
     */
    private $pedidos;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Contrato", mappedBy="id_cli")
     */
    private $contratos;

    public function __construct()
    {
        $this->direccions = new ArrayCollection();
        $this->pedidos = new ArrayCollection();
        $this->contratos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDocCli(): ?string
    {
        return $this->doc_cli;
    }

    public function setDocCli(string $doc_cli): self
    {
        $this->doc_cli = $doc_cli;

        return $this;
    }

    public function getNomCli(): ?string
    {
        return $this->nom_cli;
    }

    public function setNomCli(string $nom_cli): self
    {
        $this->nom_cli = $nom_cli;

        return $this;
    }

    public function getApeCli(): ?string
    {
        return $this->ape_cli;
    }

    public function setApeCli(string $ape_cli): self
    {
        $this->ape_cli = $ape_cli;

        return $this;
    }

    /**
     * @return Collection|Direccion[]
     */
    public function getDireccions(): Collection
    {
        return $this->direccions;
    }

    public function addDireccion(Direccion $direccion): self
    {
        if (!$this->direccions->contains($direccion)) {
            $this->direccions[] = $direccion;
            $direccion->setIdCli($this);
        }

        return $this;
    }

    public function removeDireccion(Direccion $direccion): self
    {
        if ($this->direccions->contains($direccion)) {
            $this->direccions->removeElement($direccion);
            // set the owning side to null (unless already changed)
            if ($direccion->getIdCli() === $this) {
                $direccion->setIdCli(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Pedido[]
     */
    public function getPedidos(): Collection
    {
        return $this->pedidos;
    }

    public function addPedido(Pedido $pedido): self
    {
        if (!$this->pedidos->contains($pedido)) {
            $this->pedidos[] = $pedido;
            $pedido->setIdCli($this);
        }

        return $this;
    }

    public function removePedido(Pedido $pedido): self
    {
        if ($this->pedidos->contains($pedido)) {
            $this->pedidos->removeElement($pedido);
            // set the owning side to null (unless already changed)
            if ($pedido->getIdCli() === $this) {
                $pedido->setIdCli(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Contrato[]
     */
    public function getContratos(): Collection
    {
        return $this->contratos;
    }

    public function addContrato(Contrato $contrato): self
    {
        if (!$this->contratos->contains($contrato)) {
            $this->contratos[] = $contrato;
            $contrato->setIdCli($this);
        }

        return $this;
    }

    public function removeContrato(Contrato $contrato): self
    {
        if ($this->contratos->contains($contrato)) {
            $this->contratos->removeElement($contrato);
            // set the owning side to null (unless already changed)
            if ($contrato->getIdCli() === $this) {
                $contrato->setIdCli(null);
            }
        }

        return $this;
    }

}
