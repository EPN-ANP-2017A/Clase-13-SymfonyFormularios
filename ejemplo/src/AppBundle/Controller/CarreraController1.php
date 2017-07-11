<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Carrera;
use AppBundle\Form\CarreraType;
use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CarreraController1 extends Controller
{
	/**
	 * @Route("/carrera/crear", name="nueva_carrera")
	 * @param Request $request
	 *
	 * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
	 */
	public function crearAction(Request $request)
	{
		$carrera = new Carrera();
		$form = $this->createForm(CarreraType::class, $carrera);
		$form
			->add('acepto', CheckboxType::class, array(
			'mapped' => false
			))
			->remove('descripcion');

		$form->handleRequest($request);

		if ($form->isSubmitted() && $form->isValid()) {
			$carrera = $form->getData();
			$carrera->setDescripcion('Esta es la descripción de la carrera ' . $carrera->getNombre());

			$em = $this->getDoctrine()->getManager();
			$em->persist($carrera);
			$em->flush();

			return $this->redirectToRoute('ver_carrera', array(
				'idCarrera' => $carrera->getId()
			));
		}

		return $this->render('AppBundle:Carrera:crear.html.twig', array(
			'form' => $form->createView(),
		));
	}

	/**
	 * @Route("/carrera/ver/{idCarrera}", name="ver_carrera")
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
