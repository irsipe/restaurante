<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reserva
 *
 * @ORM\Table(name="reserva", indexes={@ORM\Index(name="idx_fecha", columns={"fecha"}), @ORM\Index(name="fk_idcliente_idx", columns={"idcliente"})})
 * @ORM\Entity
 */
class Reserva
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="date", nullable=false)
     */
    private $fecha;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="hora", type="time", nullable=false)
     */
    private $hora;

    /**
     * @var integer
     *
     * @ORM\Column(name="ncomensales", type="integer", nullable=false)
     */
    private $ncomensales;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=100, nullable=false)
     */
    private $nombre;

    /**
     * @var integer
     *
     * @ORM\Column(name="idmesa", type="integer", nullable=true)
     */
    private $idmesa;

    /**
     * @var integer
     *
     * @ORM\Column(name="idreserva", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idreserva;

    /**
     * @var \AppBundle\Entity\Cliente
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Cliente")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idcliente", referencedColumnName="idcliente")
     * })
     */
    private $idcliente;



    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     *
     * @return Reserva
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
     * Set hora
     *
     * @param \DateTime $hora
     *
     * @return Reserva
     */
    public function setHora($hora)
    {
        $this->hora = $hora;

        return $this;
    }

    /**
     * Get hora
     *
     * @return \DateTime
     */
    public function getHora()
    {
        return $this->hora;
    }

    /**
     * Set ncomensales
     *
     * @param integer $ncomensales
     *
     * @return Reserva
     */
    public function setNcomensales($ncomensales)
    {
        $this->ncomensales = $ncomensales;

        return $this;
    }

    /**
     * Get ncomensales
     *
     * @return integer
     */
    public function getNcomensales()
    {
        return $this->ncomensales;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Reserva
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set idmesa
     *
     * @param integer $idmesa
     *
     * @return Reserva
     */
    public function setIdmesa($idmesa)
    {
        $this->idmesa = $idmesa;

        return $this;
    }

    /**
     * Get idmesa
     *
     * @return integer
     */
    public function getIdmesa()
    {
        return $this->idmesa;
    }

    /**
     * Get idreserva
     *
     * @return integer
     */
    public function getIdreserva()
    {
        return $this->idreserva;
    }

    /**
     * Set idcliente
     *
     * @param \AppBundle\Entity\Cliente $idcliente
     *
     * @return Reserva
     */
    public function setIdcliente(\AppBundle\Entity\Cliente $idcliente = null)
    {
        $this->idcliente = $idcliente;

        return $this;
    }

    /**
     * Get idcliente
     *
     * @return \AppBundle\Entity\Cliente
     */
    public function getIdcliente()
    {
        return $this->idcliente;
    }
}
