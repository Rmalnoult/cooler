<?php

namespace Cooler\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BeerController extends Controller
{
    public function indexAction($beerId)
    {

        return $this->render('CoolerMainBundle:Profile:profile.html.twig', array(
                // ...
            ));    }

}
