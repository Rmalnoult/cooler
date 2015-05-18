<?php

namespace Cooler\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Functions related to the application's cooler (collection of one user's beers)
 */
class CoolerController extends Controller
{
    /**
     * parameter : $userId
     * Get User's beers in an arrayCollection
     * return the cooler view
     */
    public function indexAction($userId)
    {

    	$user = $this->getUserById($userId);
    	$beers = $user->getBeers();
        return $this->render('CoolerMainBundle:Cooler:index.html.twig', array(
                'user' => $user,
                'beers' => $beers,
            ));    
    }
    /**
     * parameter : $userId
     * Get User object from doctrine's user repository
     * return user object
     */
    public function getUserById($userId)
    {
        $userRepository = $this->getDoctrine()->getRepository('CoolerUserBundle:User');
        $user = $userRepository->find($userId);
        return $user;
    }

}
