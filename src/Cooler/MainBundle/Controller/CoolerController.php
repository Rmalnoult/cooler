<?php

namespace Cooler\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CoolerController extends Controller
{
    public function indexAction($userId)
    {

    	$user = $this->getUserById($userId);
    	$beers = $user->getBeers();
        return $this->render('CoolerMainBundle:Cooler:index.html.twig', array(
                'user' => $user,
                'beers' => $beers,
            ));    
    }
    public function getUserById($userId)
    {
        $userRepository = $this->getDoctrine()->getRepository('CoolerUserBundle:User');
        $user = $userRepository->find($userId);
        return $user;
    }

}
