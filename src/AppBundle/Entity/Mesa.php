<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Mesa
 *
 * @ORM\Table(name="mesa")
 * @ORM\Entity
 */
class Mesa
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ncomensales", type="integer", nullable=false)
     */
    private $ncomensales;

    /**
     * @var string
     *
     * @ORM\Column(name="ubicacion", type="string", length=45, nullable=true)
     */
    private $ubicacion;

    /**
     * @var integer
     *
     * @ORM\Column(name="idmesa", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idmesa;



    /**
     * Set ncomensales
     *
     * @param integer $ncomensales
     *
     * @return Mesa
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
     * Set ubicacion
     *
     * @param string $ubicacion
     *
     * @return Mesa
     */
    public function setUbicacion($ubicacion)
    {
        $this->ubicacion = $ubicacion;

        return $this;
    }

    /**
     * Get ubicacion
     *
     * @return string
     */
    public function getUbicacion()
    {
        return $this->ubicacion;
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
}
