<?php

namespace Cooler\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class AjaxController extends Controller
{
    public function searchBeerAction(Request $request)
    {
    	$searchterm = $request->get('term');

    	$query = $this->getDoctrine()->getEntityManager()->createQuery("SELECT o FROM CoolerMainBundle:beers o WHERE o.name like :searchterm")
    	->setParameter('searchterm', '%'.$searchterm.'%')
    	->setMaxResults( 10 );

    	$beers = $query->getResult();
    	$searchResults = array();
    	foreach ($beers as $beer) {

    		$array = array(
    			'name' => $beer->getName(),
    			'id' => $beer->getId(),
    			);
    		array_push($searchResults, $array); 
    	}
    	$response = new JsonResponse();
    	// $response->setData(array($response));
    	$response->setData(
    	    $searchResults
    	);
    	return $response;
    }

}
