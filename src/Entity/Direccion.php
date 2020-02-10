<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DireccionRepository")
 */
class Direccion
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
    private $dir_cli;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $tel_cli;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $est_dir;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Cliente", inversedBy="direccions")
     */
    private $id_cli;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDirCli(): ?string
    {
        return $this->dir_cli;
    }

    public function setDirCli(string $dir_cli): self
    {
        $this->dir_cli = $dir_cli;

        return $this;
    }

    public function getTelCli(): ?string
    {
        return $this->tel_cli;
    }

    public function setTelCli(string $tel_cli): self
    {
        $this->tel_cli = $tel_cli;

        return $this;
    }

    public function getEstDir(): ?string
    {
        return $this->est_dir;
    }

    public function setEstDir(string $est_dir): self
    {
        $this->est_dir = $est_dir;

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
       
}
