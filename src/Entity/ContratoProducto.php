<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ContratoProductoRepository")
 */
class ContratoProducto
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Contrato", inversedBy="contratoProductos")
     */
    private $id_con;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Producto", inversedBy="contratoProductos")
     */
    private $id_pro;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdCon(): ?Contrato
    {
        return $this->id_con;
    }

    public function setIdCon(?Contrato $id_con): self
    {
        $this->id_con = $id_con;

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
}
