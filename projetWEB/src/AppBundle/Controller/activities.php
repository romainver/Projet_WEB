<?php

// src/AppBundle/Controller/LuckyController.php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class activities extends Controller
{
    /**
     * @Route("/activities", name="activites")
     */
    public function activitiesAction()
    {
        return $this->render('activities.html.twig');
    }
}