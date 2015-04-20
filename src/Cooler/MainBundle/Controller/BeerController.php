<?php

namespace Cooler\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BeerController extends Controller
{
    /**
     * takes a beer's id as input and return beer's profile
     */
    public function indexAction($beerId)
    {
    	$beer = $this->getBeerById($beerId);
    	$style = $this->getBeerStyle($beer);
    	$category = $this->getBeerCategory($beer);

        $location = $this->getLocation($beer);


        $longitude = 150.644;

        return $this->render('CoolerMainBundle:Profile:profile.html.twig', array(
                'beer' => $beer,
                'style' => $style,
                'category' => $category,
                'location' => $location,
            )
        );    
    }
    public function getBeerById($beerId)
    {
    	$beerRepository = $this->getDoctrine()->getRepository('CoolerMainBundle:beers');
    	$beer = $beerRepository->find($beerId);
    	return $beer;
    }
    /**
     * takes a beer as input and return location information
     * if no location information is available from the database : return 0 for longitude and latitude
     */
    public function getLocation($beer)
    {
        $brewery = $this->getBrewery($beer);

        if ($brewery != null) {
            $geocodeRepository = $this->getDoctrine()->getRepository('CoolerMainBundle:breweriesgeocodes');
            $geocode = $geocodeRepository->findOneByBreweryId($brewery->getId());

            if ($geocode != null) {
                $latitude = $geocode->getLatitude();
                $longitude = $geocode->getLongitude();

                return array('latitude' => $latitude, 'longitude' => $longitude);
                
            } else {
                return array('latitude' => 0, 'longitude' => 0);
            }
        } else {
            return array('latitude' => 0, 'longitude' => 0);
        }



    }
    public function getBrewery($beer)
    {
        $breweriesRepository = $this->getDoctrine()->getRepository('CoolerMainBundle:breweries');
        $brewery = $breweriesRepository->find($beer->getId());
        return $brewery;
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
