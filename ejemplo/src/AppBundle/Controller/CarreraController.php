<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Carrera;
use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class CarreraController extends Controller
{
    /**
     * @Route("/carrera/crear")
     */
    public function crearAction()
    {
	    $carrera = new Carrera();
	    $carrera->setNombre('ASA');
	    $carrera->setDescripcion('Agua y Saneamiento Ambiental');

	    $em = $this->getDoctrine()->getManager();

	    $mensaje = '';
	    try {
		    // tells Doctrine you want to (eventually) save the Product (no queries yet)
		    $em->persist( $carrera );

		    // actually executes the queries (i.e. the INSERT query)
		    $em->flush();

		    $mensaje = 'Se ha creado la carrera con id' . $carrera->getId();

	    } catch (UniqueConstraintViolationException $exception) {
	    	$mensaje = 'Ya existe una carrera con el nombre ' . $carrera->getNombre();
	    }
//	    return new Response('Se creó una nueva carrera con id ' . $carrera->getId());

        return $this->render('AppBundle:Carrera:crear.html.twig', array(
            'mensaje' => $mensaje
        ));
    }

	/**
	 * @Route("/carrera/ver/{idCarrera}")
	 */
	public function verAction($idCarrera)
	{
		$carrera = $this->getDoctrine()
		                ->getRepository('AppBundle:Carrera')
		                ->find($idCarrera);
		$mensaje = '';
		if (!$carrera) {
			$mensaje = 'No existe una carrera con el id ' . $idCarrera;
		}


		return $this->render('AppBundle:Carrera:ver.html.twig', array(
			'mensaje' => $mensaje,
			'carrera' => $carrera
		));
	}

    /**
     * @Route("/carrera/editar")
     */
    public function editarAction()
    {
        return $this->render('AppBundle:Carrera:editar.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/carrera/listar")
     */
    public function listarAction()
    {
        return $this->render('AppBundle:Carrera:listar.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/carrera/eliminar")
     */
    public function eliminarAction()
    {
        return $this->render('AppBundle:Carrera:eliminar.html.twig', array(
            // ...
        ));
    }

}
