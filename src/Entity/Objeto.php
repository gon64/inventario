<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ObjetoRepository")
 */
class Objeto
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ns;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $marca;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $modelo;

    /**
     * @ORM\Column(type="string", length=25500, nullable=true)
     */
    private $comentario;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\usuario", inversedBy="objetos")
     */
    private $usuario;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\ubicacion", inversedBy="objetos", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $ubicacion;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TipoObjeto", inversedBy="objetos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $tipo_objeto;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\EstadoObjeto", inversedBy="objetos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $estado_objeto;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNs(): ?string
    {
        return $this->ns;
    }

    public function setNs(?string $ns): self
    {
        $this->ns = $ns;

        return $this;
    }

    public function getMarca(): ?string
    {
        return $this->marca;
    }

    public function setMarca(?string $marca): self
    {
        $this->marca = $marca;

        return $this;
    }

    public function getModelo(): ?string
    {
        return $this->modelo;
    }

    public function setModelo(?string $modelo): self
    {
        $this->modelo = $modelo;

        return $this;
    }

    public function getComentario(): ?string
    {
        return $this->comentario;
    }

    public function setComentario(?string $comentario): self
    {
        $this->comentario = $comentario;

        return $this;
    }

    public function getUsuario(): ?usuario
    {
        return $this->usuario;
    }

    public function setUsuario(?usuario $usuario): self
    {
        $this->usuario = $usuario;

        return $this;
    }

    public function getUbicacion(): ?ubicacion
    {
        return $this->ubicacion;
    }

    public function setUbicacion(ubicacion $ubicacion): self
    {
        $this->ubicacion = $ubicacion;

        return $this;
    }

    public function getTipoObjeto(): ?TipoObjeto
    {
        return $this->tipo_objeto;
    }

    public function setTipoObjeto(?TipoObjeto $tipo_objeto): self
    {
        $this->tipo_objeto = $tipo_objeto;

        return $this;
    }

    public function getEstadoObjeto(): ?EstadoObjeto
    {
        return $this->estado_objeto;
    }

    public function setEstadoObjeto(?EstadoObjeto $estado_objeto): self
    {
        $this->estado_objeto = $estado_objeto;

        return $this;
    }
}
