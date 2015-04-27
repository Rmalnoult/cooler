<?php

namespace Cooler\BeernowBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use HWI\Bundle\OAuthBundle\OAuth\Response\UserResponseInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookResponse;
use Facebook\FacebookSDKException;
use Facebook\FacebookRequestException;
use Facebook\FacebookAuthorizationException;
use Facebook\GraphObject;

class BeernowController extends Controller
{
    public function indexAction()
    {


    	$user = $this->get('security.token_storage')->getToken()->getUser();
    	if ($user != 'anon.') {

    		$user = $this->getUserById($user->getId());
    		if ($user->getFacebookId() != null) {
    			$friends = $this->getFacebookFriends($user);
    			return $this->render('CoolerBeernowBundle:Beernow:index.html.twig', array('friends' => $friends));
    		} else {
    			var_dump('connect with fb please');
    			return $this->render('CoolerMainBundle:Home:start.html.twig', array());
    		}

    	} else {
    		return $this->render('CoolerMainBundle:Home:start.html.twig', array());
    	}   
        return $this->render('CoolerBeernowBundle:Beernow:index.html.twig', array('' => ''));
    }
    public function getUserById($userId)
    {
    	$userRepository = $this->getDoctrine()->getRepository('CoolerUserBundle:User');
    	$user = $userRepository->find($userId);
    	return $user;
    }
    public function getFacebookFriends($user)
    {
    	$friends = array();

    	FacebookSession::setDefaultApplication(791734124244253, '1af8f32ddf200f69ebc5c9072f917a89');
    	$helper = new FacebookRedirectLoginHelper( $this->generateUrl( 'facebook_login', array(), true ) );
		$helper->disableSessionStatusCheck();

		$token = $user->getFacebookAccessToken();

		$session = new FacebookSession($token);
		$request = new FacebookRequest($session, 'GET', '/me/taggable_friends?limit=5000');
		$response = $request->execute();
		$graphObject = $response->getGraphObject()->asArray();

		// echo "<pre>";
		// var_dump($graphObject["data"]); 
		return $graphObject["data"];

    }
}
