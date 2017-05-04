<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Lineamenu
 *
 * @ORM\Table(name="lineamenu", indexes={@ORM\Index(name="fk_idcategoria_idx", columns={"idcategoria"}), @ORM\Index(name="fk_idmenu_idx", columns={"idmenu"}), @ORM\Index(name="fk_menu_idx", columns={"idmenu"})})
 * @ORM\Entity
 */
class Lineamenu
{
    /**
     * @var string
     *
     * @ORM\Column(name="nombreplato_es", type="string", length=45, nullable=false)
     */
    private $nombreplatoEs;

    /**
     * @var string
     *
     * @ORM\Column(name="nombreplato_cat", type="string", length=45, nullable=false)
     */
    private $nombreplatoCat;

    /**
     * @var string
     *
     * @ORM\Column(name="nombreplato_en", type="string", length=45, nullable=false)
     */
    private $nombreplatoEn;

    /**
     * @var integer
     *
     * @ORM\Column(name="idlineamenu", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idlineamenu;

    /**
     * @var \AppBundle\Entity\Menu
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Menu")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idmenu", referencedColumnName="idmenu")
     * })
     */
    private $idmenu;

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
     * Set nombreplatoEs
     *
     * @param string $nombreplatoEs
     *
     * @return Lineamenu
     */
    public function setNombreplatoEs($nombreplatoEs)
    {
        $this->nombreplatoEs = $nombreplatoEs;

        return $this;
    }

    /**
     * Get nombreplatoEs
     *
     * @return string
     */
    public function getNombreplatoEs()
    {
        return $this->nombreplatoEs;
    }

    /**
     * Set nombreplatoCat
     *
     * @param string $nombreplatoCat
     *
     * @return Lineamenu
     */
    public function setNombreplatoCat($nombreplatoCat)
    {
        $this->nombreplatoCat = $nombreplatoCat;

        return $this;
    }

    /**
     * Get nombreplatoCat
     *
     * @return string
     */
    public function getNombreplatoCat()
    {
        return $this->nombreplatoCat;
    }

    /**
     * Set nombreplatoEn
     *
     * @param string $nombreplatoEn
     *
     * @return Lineamenu
     */
    public function setNombreplatoEn($nombreplatoEn)
    {
        $this->nombreplatoEn = $nombreplatoEn;

        return $this;
    }

    /**
     * Get nombreplatoEn
     *
     * @return string
     */
    public function getNombreplatoEn()
    {
        return $this->nombreplatoEn;
    }

    /**
     * Get idlineamenu
     *
     * @return integer
     */
    public function getIdlineamenu()
    {
        return $this->idlineamenu;
    }

    /**
     * Set idmenu
     *
     * @param \AppBundle\Entity\Menu $idmenu
     *
     * @return Lineamenu
     */
    public function setIdmenu(\AppBundle\Entity\Menu $idmenu = null)
    {
        $this->idmenu = $idmenu;

        return $this;
    }

    /**
     * Get idmenu
     *
     * @return \AppBundle\Entity\Menu
     */
    public function getIdmenu()
    {
        return $this->idmenu;
    }

    /**
     * Set idcategoria
     *
     * @param \AppBundle\Entity\Categoria $idcategoria
     *
     * @return Lineamenu
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
