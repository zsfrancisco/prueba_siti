<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PedidoProductoRepository")
 */
class PedidoProducto
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Pedido", inversedBy="pedidoProductos")
     */
    private $id_ped;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Producto", inversedBy="pedidoProductos")
     */
    private $id_pro;

    /**
     * @ORM\Column(type="integer")
     */
    private $cantidad;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdPed(): ?Pedido
    {
        return $this->id_ped;
    }

    public function setIdPed(?Pedido $id_ped): self
    {
        $this->id_ped = $id_ped;

        return $this;
    }

    public function getIdPro(): ?Producto
    {
        return $this->id_pro;
    }

    public function setIdPro(?Producto $id_pro): self
    {
        $this->id_pro = $id_pro;

        return $this;
    }

    public function getCantidad(): ?int
    {
        return $this->cantidad;
    }

    public function setCantidad(int $cantidad): self
    {
        $this->cantidad = $cantidad;

        return $this;
    }
}
