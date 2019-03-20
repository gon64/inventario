<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UsuarioRepository")
 */
class Usuario
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
    private $usuario;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $correo;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\departamento", inversedBy="usuarios")
     * @ORM\JoinColumn(nullable=false)
     */
    private $departamento;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Objeto", mappedBy="usuario")
     */
    private $objetos;

    public function __construct()
    {
        $this->objetos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsuario(): ?string
    {
        return $this->usuario;
    }

    public function setUsuario(?string $usuario): self
    {
        $this->usuario = $usuario;

        return $this;
    }

    public function getCorreo(): ?string
    {
        return $this->correo;
    }

    public function setCorreo(?string $correo): self
    {
        $this->correo = $correo;

        return $this;
    }

    public function getDepartamento(): ?departamento
    {
        return $this->departamento;
    }

    public function setDepartamento(?departamento $departamento): self
    {
        $this->departamento = $departamento;

        return $this;
    }

    /**
     * @return Collection|Objeto[]
     */
    public function getObjetos(): Collection
    {
        return $this->objetos;
    }

    public function addObjeto(Objeto $objeto): self
    {
        if (!$this->objetos->contains($objeto)) {
            $this->objetos[] = $objeto;
            $objeto->setUsuario($this);
        }

        return $this;
    }

    public function removeObjeto(Objeto $objeto): self
    {
        if ($this->objetos->contains($objeto)) {
            $this->objetos->removeElement($objeto);
            // set the owning side to null (unless already changed)
            if ($objeto->getUsuario() === $this) {
                $objeto->setUsuario(null);
            }
        }

        return $this;
    }
}
