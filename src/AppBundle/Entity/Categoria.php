<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Categoria
 *
 * @ORM\Table(name="categoria", indexes={@ORM\Index(name="Idx_desces", columns={"descripcion_es"})})
 * @ORM\Entity
 */
class Categoria
{
    /**
     * @var string
     *
     * @ORM\Column(name="descripcion_es", type="string", length=45, nullable=false)
     */
    private $descripcionEs;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion_cat", type="string", length=45, nullable=true)
     */
    private $descripcionCat;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion_en", type="string", length=45, nullable=true)
     */
    private $descripcionEn;

    /**
     * @var integer
     *
     * @ORM\Column(name="idcategoria", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idcategoria;



    /**
     * Set descripcionEs
     *
     * @param string $descripcionEs
     *
     * @return Categoria
     */
    public function setDescripcionEs($descripcionEs)
    {
        $this->descripcionEs = $descripcionEs;

        return $this;
    }

    /**
     * Get descripcionEs
     *
     * @return string
     */
    public function getDescripcionEs()
    {
        return $this->descripcionEs;
    }

    /**
     * Set descripcionCat
     *
     * @param string $descripcionCat
     *
     * @return Categoria
     */
    public function setDescripcionCat($descripcionCat)
    {
        $this->descripcionCat = $descripcionCat;

        return $this;
    }

    /**
     * Get descripcionCat
     *
     * @return string
     */
    public function getDescripcionCat()
    {
        return $this->descripcionCat;
    }

    /**
     * Set descripcionEn
     *
     * @param string $descripcionEn
     *
     * @return Categoria
     */
    public function setDescripcionEn($descripcionEn)
    {
        $this->descripcionEn = $descripcionEn;

        return $this;
    }

    /**
     * Get descripcionEn
     *
     * @return string
     */
    public function getDescripcionEn()
    {
        return $this->descripcionEn;
    }

    /**
     * Get idcategoria
     *
     * @return integer
     */
    public function getIdcategoria()
    {
        return $this->idcategoria;
    }
}
