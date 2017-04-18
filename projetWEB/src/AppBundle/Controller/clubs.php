<?php

// src/AppBundle/Controller/LuckyController.php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class clubs extends Controller
{
    /**
     * @Route("/clubs", name="clubs")
     */
    public function clubsAction()
    {
        return $this->render('clubs.html.twig');
    }
}