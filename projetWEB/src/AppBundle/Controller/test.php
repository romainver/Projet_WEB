<?php

// src/AppBundle/Controller/LuckyController.php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use AppBundle\Entity\User;

class test extends Controller
{
    /**
     * @Route("/test", name="test")
     */
    public function homeAction()
    {
        $user = new User();
        $form = $this->createFormBuilder($user)
            ->add('Nom', TextType::class)
            ->add('save', SubmitType::class, array('label' => 'Create Post'))
            ->getForm();

        return $this->render('test.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}