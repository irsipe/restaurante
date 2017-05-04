<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reservaplato
 *
 * @ORM\Table(name="reservaplato", indexes={@ORM\Index(name="fx_idreserva_idx", columns={"idreserva"}), @ORM\Index(name="fx_idlineamenu_idx", columns={"idlineamenu"}), @ORM\Index(name="fx_idproducto_idx", columns={"idproducto"})})
 * @ORM\Entity
 */
class Reservaplato
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idreservaplato", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idreservaplato;

    /**
     * @var \AppBundle\Entity\Reserva
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Reserva")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idreserva", referencedColumnName="idreserva")
     * })
     */
    private $idreserva;

    /**
     * @var \AppBundle\Entity\Producto
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Producto")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idproducto", referencedColumnName="idproducto")
     * })
     */
    private $idproducto;

    /**
     * @var \AppBundle\Entity\Lineamenu
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Lineamenu")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idlineamenu", referencedColumnName="idlineamenu")
     * })
     */
    private $idlineamenu;



    /**
     * Get idreservaplato
     *
     * @return integer
     */
    public function getIdreservaplato()
    {
        return $this->idreservaplato;
    }

    /**
     * Set idreserva
     *
     * @param \AppBundle\Entity\Reserva $idreserva
     *
     * @return Reservaplato
     */
    public function setIdreserva(\AppBundle\Entity\Reserva $idreserva = null)
    {
        $this->idreserva = $idreserva;

        return $this;
    }

    /**
     * Get idreserva
     *
     * @return \AppBundle\Entity\Reserva
     */
    public function getIdreserva()
    {
        return $this->idreserva;
    }

    /**
     * Set idproducto
     *
     * @param \AppBundle\Entity\Producto $idproducto
     *
     * @return Reservaplato
     */
    public function setIdproducto(\AppBundle\Entity\Producto $idproducto = null)
    {
        $this->idproducto = $idproducto;

        return $this;
    }

    /**
     * Get idproducto
     *
     * @return \AppBundle\Entity\Producto
     */
    public function getIdproducto()
    {
        return $this->idproducto;
    }

    /**
     * Set idlineamenu
     *
     * @param \AppBundle\Entity\Lineamenu $idlineamenu
     *
     * @return Reservaplato
     */
    public function setIdlineamenu(\AppBundle\Entity\Lineamenu $idlineamenu = null)
    {
        $this->idlineamenu = $idlineamenu;

        return $this;
    }

    /**
     * Get idlineamenu
     *
     * @return \AppBundle\Entity\Lineamenu
     */
    public function getIdlineamenu()
    {
        return $this->idlineamenu;
    }
}
