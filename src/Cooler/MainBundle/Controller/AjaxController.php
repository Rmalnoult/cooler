<?php

namespace Cooler\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class AjaxController extends Controller
{
    /**
     * Looks for a term in the beer database and send back json response with an array of beers
     */
    public function searchBeerAction(Request $request)
    {
    	$searchterm = $request->get('term');

    	$query = $this->getDoctrine()->getEntityManager()->createQuery("SELECT o FROM CoolerMainBundle:beers o WHERE o.name like :searchterm")
    	->setParameter('searchterm', '%'.$searchterm.'%')
    	->setMaxResults( 10 );

    	$beers = $query->getResult();
    	$searchResults = array();
    	foreach ($beers as $beer) {

            $category = $this->getBeerCategory($beer);

    		$array = array(
                'name' => $beer->getName(),
    			'filepath' => $beer->getFilepath(),
    			'id' => $beer->getId(),
                'abv' => $beer->getAbv(),
    			'category' => $category,
    			);
    		array_push($searchResults, $array); 
    	}
    	$response = new JsonResponse();
    	$response->setData(
    	    $searchResults
    	);
    	return $response;
    }
    /**
     * takes a beer as input and return beer's category
     */
    public function getBeerCategory($beer)
    {
        $catid = $beer->getCatId();
        $categoriesRepository = $this->getDoctrine()->getRepository('CoolerMainBundle:categories');
        $categories = $categoriesRepository->find($catid);
        if ($categories) {
            $category = $categories->getCatName();
        } else {
            $category = '';
        }
        
        return $category;
    }
    /**
     * Add beer to user's cooler
     */
    public function addBeerToCoolerAction(Request $request)
    {
        $user = $this->get('security.token_storage')->getToken()->getUser();

        if ($user != 'anon.') {
            $beerId = $request->get('beerId');
            $user = $this->getUserById($user->getId());
            $beer = $this->getBeerById($beerId);

            $user->addBeer($beer);

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);                
            $em->flush(); 

            $array = array(
                'success' => 'success',
                'userid' => $user->getId(),
                );

            $response = new JsonResponse();
            // $response->setData(array($response));
            $response->setData(
                $array
            );
            return $response;
        } else {
           return 'not logged in';
        }        
    }
    public function getUserById($userId)
    {
        $userRepository = $this->getDoctrine()->getRepository('CoolerUserBundle:User');
        $user = $userRepository->find($userId);
        return $user;
    }
   public function getBeerById($beerId)
    {
        $beerRepository = $this->getDoctrine()->getRepository('CoolerMainBundle:beers');
        $beer = $beerRepository->find($beerId);
        return $beer;
    }

}
