<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EscaleraAspectos
 *
 * @ORM\Table(name="escalera_aspectos")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EscaleraAspectosRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class EscaleraAspectos
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="Escalera", inversedBy="aspectos")
     */
    private $pasoEscalera;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="text")
     */
    private $descripcion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechaEdicion", type="datetime")
     */
    private $fechaEdicion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechaCreacion", type="datetime")
     */
    private $fechaCreacion;

    /**
     * @var bool
     *
     * @ORM\Column(name="estado", type="boolean")
     */
    private $estado;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

  
    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return EscaleraAspectos
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
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return EscaleraAspectos
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set fechaEdicion
     *
     * @param \DateTime $fechaEdicion
     *
     * @return EscaleraAspectos
     */
    public function setFechaEdicion($fechaEdicion)
    {
        $this->fechaEdicion = $fechaEdicion;

        return $this;
    }

    /**
     * Get fechaEdicion
     *
     * @return \DateTime
     */
    public function getFechaEdicion()
    {
        return $this->fechaEdicion;
    }

    /**
     * Set fechaCreacion
     *
     * @param \DateTime $fechaCreacion
     *
     * @return EscaleraAspectos
     */
    public function setFechaCreacion($fechaCreacion)
    {
        $this->fechaCreacion = $fechaCreacion;

        return $this;
    }

    /**
     * Get fechaCreacion
     *
     * @return \DateTime
     */
    public function getFechaCreacion()
    {
        return $this->fechaCreacion;
    }

    /**
     * Set estado
     *
     * @param boolean $estado
     *
     * @return EscaleraAspectos
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return bool
     */
    public function getEstado()
    {
        return $this->estado;
    }
    
      /**
     * @ORM\PrePersist
     */
    public function setFecha()
    {
        $this->setFechaCreacion(new \DateTime());        
        $this->setFechaEdicion(new \DateTime());
        $this->setEstado(true);
    }

    /**
     * @ORM\PreUpdate
     */
    public function setFechaActualizacion()
    {      
        $this->setFechaEdicion(new \DateTime());
    }

    /**
     * Set pasoEscalera
     *
     * @param \AppBundle\Entity\Escalera $pasoEscalera
     *
     * @return EscaleraAspectos
     */
    public function setPasoEscalera(\AppBundle\Entity\Escalera $pasoEscalera = null)
    {
        $this->pasoEscalera = $pasoEscalera;

        return $this;
    }

    /**
     * Get pasoEscalera
     *
     * @return \AppBundle\Entity\Escalera
     */
    public function getPasoEscalera()
    {
        return $this->pasoEscalera;
    }
    
    public function __toString()
    {
        return $this->getPasoEscalera()." - " .$this->getNombre();
    }
}
