<?php

// src/AppBundle/Controller/LuckyController.php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Club;
use AppBundle\Entity\Appartient;
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
        $clubs = $this->get('doctrine.orm.entity_manager')
      ->getRepository('AppBundle:Club')
      ->findAll();
      return $this->render('clubs.html.twig', array('clubs'=>$clubs));
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

     /**
     * @Route("/clubs/{id}", name="display_one_club")
     */
    public function displayOneClub(Request $request)
    {
      $club = $this->get('doctrine.orm.entity_manager')
      ->getRepository('AppBundle:Club')
      ->findOneBy(array('Idclub' => $request->get('id')));
      return $this->render('oneclub.html.twig', array('club'=>$club, 'errordisplay'=>''));
    }


    /**
     * @Route("/clubs/{id}/register", name="inscrireclub")
     */
    public function registerClub(Request $request)
    {
      $session = $request->getSession();
      $clubs = $this->get('doctrine.orm.entity_manager')
        ->getRepository('AppBundle:Club')
        ->findOneBy(array('Idclub' => $request->get('id')));
        if($session->get('iduser')!='')
        {
        $appartient = $this->get('doctrine.orm.entity_manager')
        ->getRepository('AppBundle:Appartient')
        ->findOneBy(array('Idutilisateur' => $session->get('iduser'),'Idclub' => $request->get('id')));
        if(is_null($appartient))
        {
          $newparticipant = new Appartient();
          $newparticipant->setIdclub($request->get('id'));
          $newparticipant->setIdutilisateur($session->get('iduser'));
          $newparticipant->setRole('membre');
          $em = $this->get('doctrine.orm.entity_manager');
          $em->persist($newparticipant);
          $em->flush();
          $errormessage = 'Vous êtes désormais inscrit à ce club';
          return $this->render('oneclub.html.twig', array('club'=>$clubs, 'errordisplay'=>$errormessage));
        }
        else
        {
          $errormessage = 'Vous êtes déjà inscrit à cette activitée';
          return $this->render('oneclub.html.twig', array('club'=>$clubs, 'errordisplay'=>$errormessage));
        }
        }
      $errormessage = 'Vous devez avoir un compte pour vous inscrire à ce club';
          return $this->render('oneclub.html.twig', array('club'=>$clubs, 'errordisplay'=>$errormessage));

    }

}