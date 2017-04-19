<?php

// src/AppBundle/Controller/LuckyController.php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Club;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class clubs extends Controller
{
    /**
     * @Route("/clubs", name="clubs")
     */
    public function clubsAction()
    {
        return $this->render('clubs.html.twig');
    }

    /**
     * @Route("/clubs/new", name="new_club")
     */

    public function newClub(Request $request)
    {
      $club = new Club();
      $form = $this->createFormBuilder($club)
      ->add('Nomclub', TextType::class)
      ->add('Descriptioncourte', TextAreaType::class)
      ->add('descriptionlongue', TextareaType::class)
      ->add('Photoclub', UrlType::class)
      ->add('Budgetclub', NumberType::class)
      ->add('save', SubmitType::class, array('label' => 'Creer mon club'))
      ->getForm();
      $form->handleRequest($request);
      if($form->isSubmitted() && $form->isValid())
      {
         $club = $form->getData();
         $em = $this->getDoctrine()->getManager();
         $em->persist($club);
         $em->flush();
        return $this->redirectToRoute('home'); 
      }

      return $this->render('test.html.twig', array(
        'form' => $form->createView(),
        )); 
    }
}