<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Estudiante
 *
 * @ORM\Table(name="estudiante")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EstudianteRepository")
 */
class Estudiante
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
     * @ORM\Column(name="nombre", type="string", length=80)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="apellido", type="string", length=80)
     */
    private $apellido;

    /**
     * @var string
     *
     * @ORM\Column(name="cedula", type="string", length=10, unique=true)
     */
    private $cedula;

	/**
	 * @ORM\ManyToOne(targetEntity="Carrera", inversedBy="estudiantes")
	 * @ORM\JoinColumn(name="carrera_id", referencedColumnName="id")
	 */
	private $carrera;



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
     * @return Estudiante
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
     * Set apellido
     *
     * @param string $apellido
     *
     * @return Estudiante
     */
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;

        return $this;
    }

    /**
     * Get apellido
     *
     * @return string
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * Set cedula
     *
     * @param string $cedula
     *
     * @return Estudiante
     */
    public function setCedula($cedula)
    {
        $this->cedula = $cedula;

        return $this;
    }

    /**
     * Get cedula
     *
     * @return string
     */
    public function getCedula()
    {
        return $this->cedula;
    }

    /**
     * Set carrera
     *
     * @param \AppBundle\Entity\Carrera $carrera
     *
     * @return Estudiante
     */
    public function setCarrera(\AppBundle\Entity\Carrera $carrera = null)
    {
        $this->carrera = $carrera;

        return $this;
    }

    /**
     * Get carrera
     *
     * @return \AppBundle\Entity\Carrera
     */
    public function getCarrera()
    {
        return $this->carrera;
    }
}
