<?php

namespace Cooler\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\FormBuilder;

class ProfileController extends Controller
{
    public function indexAction($userId)
    {


    	$user = $this->get('security.token_storage')->getToken()->getUser();
    	if ($user != 'anon.') {

    		$userRepository = $this->getDoctrine()->getRepository('CoolerUserBundle:User');
    		$user = $userRepository->find($userId);

    		return $this->render('CoolerUserBundle:Profile:index.html.twig', array(
    			'user' => $user,
    			)
    		);
    	} else {
    		return $this->render('CoolerMainBundle:Home:start.html.twig', array());
    	}    
    }
}
