<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ContratoRepository")
 */
class Contrato
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Cliente", inversedBy="contratos")
     */
    private $id_cli;

    /**
     * @ORM\Column(type="integer")
     */
    private $num_con;

    /**
     * @ORM\Column(type="date")
     */
    private $vig_con;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ContratoProducto", mappedBy="id_con")
     */
    private $contratoProductos;

    public function __construct()
    {
        $this->contratoProductos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getNumCon(): ?int
    {
        return $this->num_con;
    }

    public function setNumCon(int $num_con): self
    {
        $this->num_con = $num_con;

        return $this;
    }

    public function getVigCon(): ?\DateTimeInterface
    {
        return $this->vig_con;
    }

    public function setVigCon(\DateTimeInterface $vig_con): self
    {
        $this->vig_con = $vig_con;

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
            $contratoProducto->setIdCon($this);
        }

        return $this;
    }

    public function removeContratoProducto(ContratoProducto $contratoProducto): self
    {
        if ($this->contratoProductos->contains($contratoProducto)) {
            $this->contratoProductos->removeElement($contratoProducto);
            // set the owning side to null (unless already changed)
            if ($contratoProducto->getIdCon() === $this) {
                $contratoProducto->setIdCon(null);
            }
        }

        return $this;
    }
}
