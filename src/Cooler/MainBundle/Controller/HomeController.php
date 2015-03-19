<?php

namespace Cooler\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class HomeController extends Controller
{
	public function indexAction(Request $request)
	{
		$user = $this->get('security.token_storage')->getToken()->getUser();
		if ($user != 'anon.') {
			$user = $this->getUserById($user->getId());
			return $this->render('CoolerMainBundle:Home:home.html.twig', array(
				'user' => $user,
				)
			);
		} else {
			return $this->render('CoolerMainBundle:Home:start.html.twig', array());
		}        
	}
	public function getUserById($userId)
	{
		$userRepository = $this->getDoctrine()->getRepository('CoolerUserBundle:User');
		$user = $userRepository->find($userId);
		return $user;
	}
	public function FindaBarAction(Request $request)
	{
		$user = $this->get('security.token_storage')->getToken()->getUser();
		if ($user != 'anon.') {
			$user = $this->getUserById($user->getId());
			return $this->render('CoolerMainBundle:Bars:barlist.html.twig', array(
				'user' => $user,
				)
			);
		} else {
			return $this->render('CoolerMainBundle:Home:start.html.twig', array());
		}    
	}
}
