<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Carrera;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Carrera controller.
 *
 * @Route("carrera")
 */
class CarreraController extends Controller
{
    /**
     * Lists all carrera entities.
     *
     * @Route("/", name="carrera_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $carreras = $em->getRepository('AppBundle:Carrera')->findAll();

        return $this->render('carrera/index.html.twig', array(
            'carreras' => $carreras,
        ));
    }

    /**
     * Creates a new carrera entity.
     *
     * @Route("/nuevo", name="carrera_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $carrera = new Carrera();
        $form = $this->createForm('AppBundle\Form\CarreraType', $carrera);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($carrera);
            $em->flush();

            return $this->redirectToRoute('carrera_show', array('id' => $carrera->getId()));
        }

        return $this->render('carrera/new.html.twig', array(
            'carrera' => $carrera,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a carrera entity.
     *
     * @Route("/{id}", name="carrera_show")
     * @Method("GET")
     */
    public function showAction(Carrera $carrera)
    {
        $deleteForm = $this->createDeleteForm($carrera);

        return $this->render('carrera/show.html.twig', array(
            'carrera' => $carrera,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing carrera entity.
     *
     * @Route("/{id}/edit", name="carrera_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Carrera $carrera)
    {
        $deleteForm = $this->createDeleteForm($carrera);
        $editForm = $this->createForm('AppBundle\Form\CarreraType', $carrera);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('carrera_edit', array('id' => $carrera->getId()));
        }

        return $this->render('carrera/edit.html.twig', array(
            'carrera' => $carrera,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a carrera entity.
     *
     * @Route("/{id}", name="carrera_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Carrera $carrera)
    {
        $form = $this->createDeleteForm($carrera);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($carrera);
            $em->flush();
        }

        return $this->redirectToRoute('carrera_index');
    }

    /**
     * Creates a form to delete a carrera entity.
     *
     * @param Carrera $carrera The carrera entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Carrera $carrera)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('carrera_delete', array('id' => $carrera->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
