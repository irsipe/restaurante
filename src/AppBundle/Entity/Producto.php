<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Producto
 *
 * @ORM\Table(name="producto", indexes={@ORM\Index(name="Idx_nombre_es", columns={"nombre_es"}), @ORM\Index(name="idx_nombre_cat", columns={"nombre_cat"}), @ORM\Index(name="idx_nombre_en", columns={"nombre_en"}), @ORM\Index(name="FK_idcategoria_idx", columns={"idcategoria"})})
 * @ORM\Entity
 */
class Producto
{
    /**
     * @var string
     *
     * @ORM\Column(name="nombre_es", type="string", length=45, nullable=false)
     */
    private $nombreEs;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_cat", type="string", length=45, nullable=false)
     */
    private $nombreCat;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_en", type="string", length=45, nullable=false)
     */
    private $nombreEn;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion_es", type="string", length=100, nullable=false)
     */
    private $descripcionEs;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion_cat", type="string", length=100, nullable=true)
     */
    private $descripcionCat;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion_en", type="string", length=100, nullable=true)
     */
    private $descripcionEn;

    /**
     * @var string
     *
     * @ORM\Column(name="preparacion_es", type="text", length=65535, nullable=true)
     */
    private $preparacionEs;

    /**
     * @var string
     *
     * @ORM\Column(name="preparacion_cat", type="text", length=65535, nullable=true)
     */
    private $preparacionCat;

    /**
     * @var string
     *
     * @ORM\Column(name="preparacion_en", type="text", length=65535, nullable=true)
     */
    private $preparacionEn;

    /**
     * @var string
     *
     * @ORM\Column(name="precio", type="decimal", precision=6, scale=2, nullable=true)
     */
    private $precio;

    /**
     * @var string
     *
     * @ORM\Column(name="imagen", type="string", length=100, nullable=true)
     */
    private $imagen;

    /**
     * @var integer
     *
     * @ORM\Column(name="idproducto", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idproducto;

    /**
     * @var \AppBundle\Entity\Categoria
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Categoria")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idcategoria", referencedColumnName="idcategoria")
     * })
     */
    private $idcategoria;



    /**
     * Set nombreEs
     *
     * @param string $nombreEs
     *
     * @return Producto
     */
    public function setNombreEs($nombreEs)
    {
        $this->nombreEs = $nombreEs;

        return $this;
    }

    /**
     * Get nombreEs
     *
     * @return string
     */
    public function getNombreEs()
    {
        return $this->nombreEs;
    }

    /**
     * Set nombreCat
     *
     * @param string $nombreCat
     *
     * @return Producto
     */
    public function setNombreCat($nombreCat)
    {
        $this->nombreCat = $nombreCat;

        return $this;
    }

    /**
     * Get nombreCat
     *
     * @return string
     */
    public function getNombreCat()
    {
        return $this->nombreCat;
    }

    /**
     * Set nombreEn
     *
     * @param string $nombreEn
     *
     * @return Producto
     */
    public function setNombreEn($nombreEn)
    {
        $this->nombreEn = $nombreEn;

        return $this;
    }

    /**
     * Get nombreEn
     *
     * @return string
     */
    public function getNombreEn()
    {
        return $this->nombreEn;
    }

    /**
     * Set descripcionEs
     *
     * @param string $descripcionEs
     *
     * @return Producto
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
     * @return Producto
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
     * @return Producto
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
     * Set preparacionEs
     *
     * @param string $preparacionEs
     *
     * @return Producto
     */
    public function setPreparacionEs($preparacionEs)
    {
        $this->preparacionEs = $preparacionEs;

        return $this;
    }

    /**
     * Get preparacionEs
     *
     * @return string
     */
    public function getPreparacionEs()
    {
        return $this->preparacionEs;
    }

    /**
     * Set preparacionCat
     *
     * @param string $preparacionCat
     *
     * @return Producto
     */
    public function setPreparacionCat($preparacionCat)
    {
        $this->preparacionCat = $preparacionCat;

        return $this;
    }

    /**
     * Get preparacionCat
     *
     * @return string
     */
    public function getPreparacionCat()
    {
        return $this->preparacionCat;
    }

    /**
     * Set preparacionEn
     *
     * @param string $preparacionEn
     *
     * @return Producto
     */
    public function setPreparacionEn($preparacionEn)
    {
        $this->preparacionEn = $preparacionEn;

        return $this;
    }

    /**
     * Get preparacionEn
     *
     * @return string
     */
    public function getPreparacionEn()
    {
        return $this->preparacionEn;
    }

    /**
     * Set precio
     *
     * @param string $precio
     *
     * @return Producto
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
     * Set imagen
     *
     * @param string $imagen
     *
     * @return Producto
     */
    public function setImagen($imagen)
    {
        $this->imagen = $imagen;

        return $this;
    }

    /**
     * Get imagen
     *
     * @return string
     */
    public function getImagen()
    {
        return $this->imagen;
    }

    /**
     * Get idproducto
     *
     * @return integer
     */
    public function getIdproducto()
    {
        return $this->idproducto;
    }

    /**
     * Set idcategoria
     *
     * @param \AppBundle\Entity\Categoria $idcategoria
     *
     * @return Producto
     */
    public function setIdcategoria(\AppBundle\Entity\Categoria $idcategoria = null)
    {
        $this->idcategoria = $idcategoria;

        return $this;
    }

    /**
     * Get idcategoria
     *
     * @return \AppBundle\Entity\Categoria
     */
    public function getIdcategoria()
    {
        return $this->idcategoria;
    }
}
