<?php

// src/AppBundle/Controller/LuckyController.php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class profile extends Controller
{
    /**
     * @Route("/profile", name="profile")
     */
    public function profileAction()
    {
        return $this->render('profile.html.twig');
    }
}