<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cliente
 *
 * @ORM\Table(name="cliente", indexes={@ORM\Index(name="idx_nombre", columns={"nombre"}), @ORM\Index(name="idx_apellido1", columns={"apellido1"})})
 * @ORM\Entity
 */
class Cliente
{
    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=45, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="apellido1", type="string", length=45, nullable=false)
     */
    private $apellido1;

    /**
     * @var string
     *
     * @ORM\Column(name="apellido2", type="string", length=45, nullable=true)
     */
    private $apellido2;

    /**
     * @var string
     *
     * @ORM\Column(name="idioma", type="string", length=45, nullable=true)
     */
    private $idioma;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechanacimiento", type="date", nullable=true)
     */
    private $fechanacimiento;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=100, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="movil", type="string", length=15, nullable=false)
     */
    private $movil;

    /**
     * @var string
     *
     * @ORM\Column(name="tffijo", type="string", length=15, nullable=true)
     */
    private $tffijo;

    /**
     * @var string
     *
     * @ORM\Column(name="direccion", type="string", length=100, nullable=true)
     */
    private $direccion;

    /**
     * @var string
     *
     * @ORM\Column(name="poblacion", type="string", length=100, nullable=true)
     */
    private $poblacion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechaalta", type="date", nullable=true)
     */
    private $fechaalta;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechabaja", type="date", nullable=true)
     */
    private $fechabaja;

    /**
     * @var integer
     *
     * @ORM\Column(name="descuento", type="integer", nullable=true)
     */
    private $descuento;

    /**
     * @var boolean
     *
     * @ORM\Column(name="activo", type="boolean", nullable=true)
     */
    private $activo;

    /**
     * @var integer
     *
     * @ORM\Column(name="nvisitas", type="integer", nullable=true)
     */
    private $nvisitas;

    /**
     * @var integer
     *
     * @ORM\Column(name="idcliente", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idcliente;



    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Cliente
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
     * Set apellido1
     *
     * @param string $apellido1
     *
     * @return Cliente
     */
    public function setApellido1($apellido1)
    {
        $this->apellido1 = $apellido1;

        return $this;
    }

    /**
     * Get apellido1
     *
     * @return string
     */
    public function getApellido1()
    {
        return $this->apellido1;
    }

    /**
     * Set apellido2
     *
     * @param string $apellido2
     *
     * @return Cliente
     */
    public function setApellido2($apellido2)
    {
        $this->apellido2 = $apellido2;

        return $this;
    }

    /**
     * Get apellido2
     *
     * @return string
     */
    public function getApellido2()
    {
        return $this->apellido2;
    }

    /**
     * Set idioma
     *
     * @param string $idioma
     *
     * @return Cliente
     */
    public function setIdioma($idioma)
    {
        $this->idioma = $idioma;

        return $this;
    }

    /**
     * Get idioma
     *
     * @return string
     */
    public function getIdioma()
    {
        return $this->idioma;
    }

    /**
     * Set fechanacimiento
     *
     * @param \DateTime $fechanacimiento
     *
     * @return Cliente
     */
    public function setFechanacimiento($fechanacimiento)
    {
        $this->fechanacimiento = $fechanacimiento;

        return $this;
    }

    /**
     * Get fechanacimiento
     *
     * @return \DateTime
     */
    public function getFechanacimiento()
    {
        return $this->fechanacimiento;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Cliente
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set movil
     *
     * @param string $movil
     *
     * @return Cliente
     */
    public function setMovil($movil)
    {
        $this->movil = $movil;

        return $this;
    }

    /**
     * Get movil
     *
     * @return string
     */
    public function getMovil()
    {
        return $this->movil;
    }

    /**
     * Set tffijo
     *
     * @param string $tffijo
     *
     * @return Cliente
     */
    public function setTffijo($tffijo)
    {
        $this->tffijo = $tffijo;

        return $this;
    }

    /**
     * Get tffijo
     *
     * @return string
     */
    public function getTffijo()
    {
        return $this->tffijo;
    }

    /**
     * Set direccion
     *
     * @param string $direccion
     *
     * @return Cliente
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * Get direccion
     *
     * @return string
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set poblacion
     *
     * @param string $poblacion
     *
     * @return Cliente
     */
    public function setPoblacion($poblacion)
    {
        $this->poblacion = $poblacion;

        return $this;
    }

    /**
     * Get poblacion
     *
     * @return string
     */
    public function getPoblacion()
    {
        return $this->poblacion;
    }

    /**
     * Set fechaalta
     *
     * @param \DateTime $fechaalta
     *
     * @return Cliente
     */
    public function setFechaalta($fechaalta)
    {
        $this->fechaalta = $fechaalta;

        return $this;
    }

    /**
     * Get fechaalta
     *
     * @return \DateTime
     */
    public function getFechaalta()
    {
        return $this->fechaalta;
    }

    /**
     * Set fechabaja
     *
     * @param \DateTime $fechabaja
     *
     * @return Cliente
     */
    public function setFechabaja($fechabaja)
    {
        $this->fechabaja = $fechabaja;

        return $this;
    }

    /**
     * Get fechabaja
     *
     * @return \DateTime
     */
    public function getFechabaja()
    {
        return $this->fechabaja;
    }

    /**
     * Set descuento
     *
     * @param integer $descuento
     *
     * @return Cliente
     */
    public function setDescuento($descuento)
    {
        $this->descuento = $descuento;

        return $this;
    }

    /**
     * Get descuento
     *
     * @return integer
     */
    public function getDescuento()
    {
        return $this->descuento;
    }

    /**
     * Set activo
     *
     * @param boolean $activo
     *
     * @return Cliente
     */
    public function setActivo($activo)
    {
        $this->activo = $activo;

        return $this;
    }

    /**
     * Get activo
     *
     * @return boolean
     */
    public function getActivo()
    {
        return $this->activo;
    }

    /**
     * Set nvisitas
     *
     * @param integer $nvisitas
     *
     * @return Cliente
     */
    public function setNvisitas($nvisitas)
    {
        $this->nvisitas = $nvisitas;

        return $this;
    }

    /**
     * Get nvisitas
     *
     * @return integer
     */
    public function getNvisitas()
    {
        return $this->nvisitas;
    }

    /**
     * Get idcliente
     *
     * @return integer
     */
    public function getIdcliente()
    {
        return $this->idcliente;
    }
    
        public function __toString() {
         return $this->idcliente.' '.$this->nombre.' '.$this->apellido1;
        ;
    }
}
