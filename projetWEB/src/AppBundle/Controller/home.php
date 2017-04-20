<?php

// src/AppBundle/Controller/LuckyController.php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class home extends Controller
{
    /**
     * @Route("/home", name="home")
     */
    public function homeAction(Request $request)
    {
        $session = $request->getSession();
        $user = $this->get('doctrine.orm.entity_manager')
      ->getRepository('AppBundle:User')
      ->findOneBy(array('Idutilisateur' => $session->get('iduser')));
      	$activity = $this->get('doctrine.orm.entity_manager')
      ->getRepository('AppBundle:Activity')
      ->findAll();
	  return $this->render('home.html.twig', array('activities'=>$activity));
    }
}