<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EstadoObjetoRepository")
 */
class EstadoObjeto
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
    private $estado;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Objeto", mappedBy="estado_objeto")
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

    public function getEstado(): ?string
    {
        return $this->estado;
    }

    public function setEstado(string $estado): self
    {
        $this->estado = $estado;

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
            $objeto->setEstadoObjeto($this);
        }

        return $this;
    }

    public function removeObjeto(Objeto $objeto): self
    {
        if ($this->objetos->contains($objeto)) {
            $this->objetos->removeElement($objeto);
            // set the owning side to null (unless already changed)
            if ($objeto->getEstadoObjeto() === $this) {
                $objeto->setEstadoObjeto(null);
            }
        }

        return $this;
    }
}
