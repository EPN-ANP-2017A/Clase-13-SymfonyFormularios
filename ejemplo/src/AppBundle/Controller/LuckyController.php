<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class LuckyController extends Controller
{
    /**
     * @Route("/lucky/number",
     *     name="lucky_number")
     */
    public function numberAction()
    {

	    $number = mt_rand(0, 100);

	    return $this->render('AppBundle:Lucky:number.html.twig', array(
            'numero' => $number
        ));
    }

	/**
	 * @Route("/lucky/number/limit/{limit}",
	 *     name="lucky_number_limit",
	 *     requirements={"limit": "\d+"})
	 */
	public function numberLimitAction($limit = 100)
	{

		$number = mt_rand(0, $limit);

		return $this->render('AppBundle:Lucky:number.html.twig', array(
			'numero' => $number
		));
	}

}
