<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TipoObjetoRepository")
 */
class TipoObjeto
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
    private $tipo;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Objeto", mappedBy="tipo_objeto")
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

    public function getTipo(): ?string
    {
        return $this->tipo;
    }

    public function setTipo(string $tipo): self
    {
        $this->tipo = $tipo;

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
            $objeto->setTipoObjeto($this);
        }

        return $this;
    }

    public function removeObjeto(Objeto $objeto): self
    {
        if ($this->objetos->contains($objeto)) {
            $this->objetos->removeElement($objeto);
            // set the owning side to null (unless already changed)
            if ($objeto->getTipoObjeto() === $this) {
                $objeto->setTipoObjeto(null);
            }
        }

        return $this;
    }
}
