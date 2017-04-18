<?php

// src/AppBundle/Controller/LuckyController.php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class test extends Controller
{
    /**
     * @Route("/test", name="test")
     */
    public function profileAction()
    {
        return $this->render('test.html.twig');
    }
}