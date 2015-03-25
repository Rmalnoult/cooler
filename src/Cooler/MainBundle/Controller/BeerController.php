<?php

namespace Cooler\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BeerController extends Controller
{
    public function indexAction($beerId)
    {
    	$beer = $this->getBeerById($beerId);
    	$style = $this->getBeerStyle($beer);
    	$category = $this->getBeerCategory($beer);

        return $this->render('CoolerMainBundle:Profile:profile.html.twig', array(
                'beer' => $beer,
                'style' => $style,
                'category' => $category,
            )
        );    
    }
    public function getBeerById($beerId)
    {
    	$beerRepository = $this->getDoctrine()->getRepository('CoolerMainBundle:beers');
    	$beer = $beerRepository->find($beerId);
    	return $beer;
    }
    public function getBeerCategory($beer)
    {
    	$catid = $beer->getCatId();
    	if ($catid != -1) {
	    	$categoriesRepository = $this->getDoctrine()->getRepository('CoolerMainBundle:categories');
	    	$category = $categoriesRepository->find($catid);
	    	$category = $category->getCatName();
	    	return $category;
    	} else {
    		return '';
    	}

    }
	public function getBeerStyle($beer)
    {
    	$styleId = $beer->getStyleId();
    	if ($styleId != -1) {
    		$stylesRepository = $this->getDoctrine()->getRepository('CoolerMainBundle:styles');
    		$style = $stylesRepository->find($styleId);
    		$style = $style->getStyleName();
    		return $style;
    	} else {
    		return '';
    	}
    }

}
