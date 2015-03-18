<?php

namespace Cooler\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class HomeController extends Controller
{
	public function indexAction(Request $request)
	{

        return $this->render('CoolerMainBundle:Home:index.html.twig', array());
	}
}
