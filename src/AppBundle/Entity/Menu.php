<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Menu
 *
 * @ORM\Table(name="menu", indexes={@ORM\Index(name="idx_fecha", columns={"fecha"})})
 * @ORM\Entity
 */
class Menu
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="date", nullable=false)
     */
    private $fecha;

    /**
     * @var string
     *
     * @ORM\Column(name="precio", type="decimal", precision=6, scale=2, nullable=true)
     */
    private $precio;

    /**
     * @var integer
     *
     * @ORM\Column(name="cantidadventas", type="integer", nullable=true)
     */
    private $cantidadventas;

    /**
     * @var integer
     *
     * @ORM\Column(name="idmenu", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idmenu;



    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     *
     * @return Menu
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set precio
     *
     * @param string $precio
     *
     * @return Menu
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;

        return $this;
    }

    /**
     * Get precio
     *
     * @return string
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set cantidadventas
     *
     * @param integer $cantidadventas
     *
     * @return Menu
     */
    public function setCantidadventas($cantidadventas)
    {
        $this->cantidadventas = $cantidadventas;

        return $this;
    }

    /**
     * Get cantidadventas
     *
     * @return integer
     */
    public function getCantidadventas()
    {
        return $this->cantidadventas;
    }

    /**
     * Get idmenu
     *
     * @return integer
     */
    public function getIdmenu()
    {
        return $this->idmenu;
    }
     public function __toString() {
         return $this->idmenu.'  '.$this->fecha->format("d-m-Y");
        ;
    }
}
