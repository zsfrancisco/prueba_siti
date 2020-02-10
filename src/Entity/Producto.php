<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProductoRepository")
 */
class Producto
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
    private $nom_pro;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\PedidoProducto", mappedBy="id_pro")
     */
    private $pedidoProductos;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ContratoProducto", mappedBy="id_pro")
     */
    private $contratoProductos;

    public function __construct()
    {
        $this->pedidoProductos = new ArrayCollection();
        $this->contratoProductos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomPro(): ?string
    {
        return $this->nom_pro;
    }

    public function setNomPro(string $nom_pro): self
    {
        $this->nom_pro = $nom_pro;

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
            $pedidoProducto->setIdPro($this);
        }

        return $this;
    }

    public function removePedidoProducto(PedidoProducto $pedidoProducto): self
    {
        if ($this->pedidoProductos->contains($pedidoProducto)) {
            $this->pedidoProductos->removeElement($pedidoProducto);
            // set the owning side to null (unless already changed)
            if ($pedidoProducto->getIdPro() === $this) {
                $pedidoProducto->setIdPro(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|ContratoProducto[]
     */
    public function getContratoProductos(): Collection
    {
        return $this->contratoProductos;
    }

    public function addContratoProducto(ContratoProducto $contratoProducto): self
    {
        if (!$this->contratoProductos->contains($contratoProducto)) {
            $this->contratoProductos[] = $contratoProducto;
            $contratoProducto->setIdPro($this);
        }

        return $this;
    }

    public function removeContratoProducto(ContratoProducto $contratoProducto): self
    {
        if ($this->contratoProductos->contains($contratoProducto)) {
            $this->contratoProductos->removeElement($contratoProducto);
            // set the owning side to null (unless already changed)
            if ($contratoProducto->getIdPro() === $this) {
                $contratoProducto->setIdPro(null);
            }
        }

        return $this;
    }
}
