<?php

// src/AppBundle/Controller/LuckyController.php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Activity;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class activities extends Controller
{
    /**
     * @Route("/activity", name="activites")
     */
    public function activitiesAction()
    {
        return $this->render('activities.html.twig');
    }

    /**
     * @Route("/activity/new", name="new_activity")
     */

    public function newActivity(Request $request)
    {
      $activity = new Activity();
      $form = $this->createFormBuilder($activity)
      ->add('Nomactivite', TextType::class)
      ->add('Description', TextType::class)
      ->add('Dateactivite', DateType::class)
      ->add('save', SubmitType::class, array('label' => 'Creer une activitée'))
      ->getForm();
      $form->handleRequest($request);
      if($form->isSubmitted() && $form->isValid())
      {
         $activity = $form->getData();
         $em = $this->getDoctrine()->getManager();
         $em->persist($activity);
         $em->flush();
        return $this->redirectToRoute('home'); 
      }

      return $this->render('test.html.twig', array(
        'form' => $form->createView(),
        )); 
    }
}