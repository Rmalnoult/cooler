<?php

namespace Cooler\PhotoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Cooler\PhotoBundle\Entity\Photo;
use Symfony\Component\HttpFoundation\JsonResponse;

class CameraController extends Controller
{
    public function cameraAction()
    {
        return $this->render('CoolerPhotoBundle:Camera:camera.html.twig', array());    
    }
    public function savePhotoAction(Request $request)
    {
    	// decode base64img image in request, then save it in db, then save it as a profile pic for the artist, then return photo object
    	$em = $this->getDoctrine()->getManager();

    	$request = $this->get('request');
    	$base64img = $request->get('base64img');
    	$userId = $request->get('userId');

    	// methode upload dans l'entity photo.php
    	$userRepository = $this->getDoctrine()->getRepository('CoolerUserBundle:User');
    	$user = $userRepository->find($userId);


    	$photo = new Photo();
    	$photo->setPath();
    	$photo->setUser($user);

    	// decode base64image and put file in upload directory
    	$this->saveImage($base64img, $photo->getPath());

    	// save cropped picture in bdd
    	$em->persist($photo);
    	$em->flush();


    	$photoArray = array(
    	    'path' => $photo->getPath()
    	);

    	$response = new JsonResponse();
    	$response->setData(array(
    	    'photo' => $photoArray,
    	));
    	return $response;
    }
    public function saveImage($base64img, $photoName){
    	var_dump($base64img);
        // define photo directory
        define('UPLOAD_DIR', __DIR__.'/../../../../web/upload/image/');
        // decode base64image
        $base64img = str_replace('data:image/png;base64,', '', $base64img);
        $data = base64_decode($base64img);
        // put file in web/upload/image/ directory
        $file = UPLOAD_DIR . $photoName;
        file_put_contents($file, $data);
    }

}
