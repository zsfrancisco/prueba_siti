<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PedidoRepository")
 */
class Pedido
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $fec_ped;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Cliente", inversedBy="pedidos")
     */
    private $id_cli;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $est_ped;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\PedidoProducto", mappedBy="id_ped")
     */
    private $pedidoProductos;

    public function __construct()
    {
        $this->pedidoProductos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFecPed(): ?\DateTimeInterface
    {
        return $this->fec_ped;
    }

    public function setFecPed(\DateTimeInterface $fec_ped): self
    {
        $this->fec_ped = $fec_ped;

        return $this;
    }

    public function getIdCli(): ?Cliente
    {
        return $this->id_cli;
    }

    public function setIdCli(?Cliente $id_cli): self
    {
        $this->id_cli = $id_cli;

        return $this;
    }

    public function getEstPed(): ?string
    {
        return $this->est_ped;
    }

    public function setEstPed(string $est_ped): self
    {
        $this->est_ped = $est_ped;

        return $this;
    }

    /**
     * @return Collection|PedidoProducto[]
     */
    public function getPedidoProductos(): Collection
    {
        return $this->pedidoProductos;
    }

    public function addPedidoProducto(PedidoProducto $pedidoProducto): self
    {
        if (!$this->pedidoProductos->contains($pedidoProducto)) {
            $this->pedidoProductos[] = $pedidoProducto;
            $pedidoProducto->setIdPed($this);
        }

        return $this;
    }

    public function removePedidoProducto(PedidoProducto $pedidoProducto): self
    {
        if ($this->pedidoProductos->contains($pedidoProducto)) {
            $this->pedidoProductos->removeElement($pedidoProducto);
            // set the owning side to null (unless already changed)
            if ($pedidoProducto->getIdPed() === $this) {
                $pedidoProducto->setIdPed(null);
            }
        }

        return $this;
    }
}
