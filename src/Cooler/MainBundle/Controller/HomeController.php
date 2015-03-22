<?php

namespace Cooler\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\FormBuilder;

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
	public function testAction()
	{

		$beerRepository = $this->getDoctrine()->getRepository('CoolerMainBundle:beers');
		$beer = $beerRepository->findByName('heineken');

		var_dump($beer->getId());
		$catid = $beer->getCatId();
		var_dump($catid);
		$categoriesRepository = $this->getDoctrine()->getRepository('CoolerMainBundle:categories');
		$categories = $categoriesRepository->find($catid);
		$categories = $categories->getCatName();


		return $this->render('CoolerMainBundle:Home:test.html.twig', array('beer' => $categories));
	}
}
