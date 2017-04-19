<?php

// src/AppBundle/Controller/LuckyController.php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class home extends Controller
{
    /**
     * @Route("/home", name="home")
     */
    public function homeAction()
    {
        return $this->render('home.html.twig');
    }
}