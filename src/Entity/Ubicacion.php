<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UbicacionRepository")
 */
class Ubicacion
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
    private $ubicacion;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Objeto", mappedBy="ubicacion", cascade={"persist", "remove"})
     */
    private $objetos;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUbicacion(): ?string
    {
        return $this->ubicacion;
    }

    public function setUbicacion(string $ubicacion): self
    {
        $this->ubicacion = $ubicacion;

        return $this;
    }

    public function getObjetos(): ?Objeto
    {
        return $this->objetos;
    }

    public function setObjetos(Objeto $objetos): self
    {
        $this->objetos = $objetos;

        // set the owning side of the relation if necessary
        if ($this !== $objetos->getUbicacion()) {
            $objetos->setUbicacion($this);
        }

        return $this;
    }
}
