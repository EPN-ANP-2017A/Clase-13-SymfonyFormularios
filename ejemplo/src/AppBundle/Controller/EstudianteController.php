<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class EstudianteController extends Controller
{
    /**
     * @Route("/estudiantes/lista/{carrera}",
     * name="lista_estudiantes",
     *     requirements={
     *     "carrera": "ASI|ASA|ET|TODAS"})
     */
    public function listaAction($carrera = "TODAS")
    {
    	$estudiantes = [
    	    'ASI' => [
    	    	'Carlos',
		        'Jazmin',
		        'Jose'
	        ],
		    'ASA' => [
		    	'Juan',
			    'Andrea',
			    'Maria'
		    ],
		    'ET' => [
		    	'Andres',
			    'Carolina',
			    'David'
		    ]
	    ];

	    $lista_estudiantes = $estudiantes;

	    if ($carrera != "TODAS") {
		    $lista_estudiantes = $estudiantes[ $carrera ];
	    }

        return $this->render('AppBundle:Estudiante:lista.html.twig', array(
            'lista_estudiantes' => $lista_estudiantes,
	        'carrera' => $carrera

        ));
    }

}
