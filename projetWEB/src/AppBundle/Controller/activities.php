<?php

// src/AppBundle/Controller/LuckyController.php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Activity;
use AppBundle\Entity\Participe;
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
      ->add('lienimage', TextType::class)
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

    /**
     * @Route("/activity/{id}", name="display_one_activity")
     */
    public function displayOneActivity(Request $request)
    {
      $activity = $this->get('doctrine.orm.entity_manager')
      ->getRepository('AppBundle:Activity')
      ->findOneBy(array('Idactivite' => $request->get('id')));
      $result = $activity->getDateactivite()->format('Y-m-d');
      $dateArray = explode('-', $result);
     
      return $this->render('activities.html.twig', array('activity'=>$activity, 'year'=>$dateArray[0], 'month'=>$dateArray[1], 'day'=>$dateArray[2]));
    }

    /**
     * @Route("/activity/{id}/up", name="voteup")
     */
    public function voteForActivity(Request $request)
    {
      $activity = $this->get('doctrine.orm.entity_manager')
        ->getRepository('AppBundle:Activity')
        ->findOneBy(array('Idactivite' => $request->get('id')));
      $session = $request->getSession();
      if($session->get('username')!=null)
      {
        
        $activity->setVotepour($activity->getVotepour()+1);
        $em = $this->get('doctrine.orm.entity_manager');
        $em->persist($activity);
        $em->flush();
        $session->set('hasvoted','yes');
        return $this->render('activities.html.twig', array('activity'=>$activity, 'hasvoted'=>'yes'));
      }
        echo 'Vous devez vous connecter afin de voter';
        return $this->render('activities.html.twig', array('activity'=>$activity));
      }

    /**
     * @Route("/activity/{id}/down", name="votedown")
     */
    public function voteAgainstActivity(Request $request)
    {
       $activity = $this->get('doctrine.orm.entity_manager')
        ->getRepository('AppBundle:Activity')
        ->findOneBy(array('Idactivite' => $request->get('id')));
      $session = $request->getSession();
      if($session->get('username')!=null)
      {
        $activity->setVotecontre($activity->getVotecontre()+1);
        $em = $this->get('doctrine.orm.entity_manager');
        $em->persist($activity);
        $em->flush();
        $session->set('hasvoted','yes');
        return $this->render('activities.html.twig', array('activity'=>$activity, 'hasvoted'=>'yes'));
      }
      else{
        echo 'Vous devez vous connecter afin de voter';
        return $this->render('activities.html.twig', array('activity'=>$activity));
      }     
  }

   /**
     * @Route("/activity/{id}/register", name="votedown")
     */
    public function registerActivity(Request $request)
    {
      $session = $request->getSession();
      $activity = $this->get('doctrine.orm.entity_manager')
        ->getRepository('AppBundle:Activity')
        ->findOneBy(array('Idactivite' => $request->get('id')));
        if($session->get('iduser')!='')
        {
        $participant = $this->get('doctrine.orm.entity_manager')
        ->getRepository('AppBundle:Participe')
        ->findOneBy(array('Idutilisateur' => $session->get('iduser'),'Idactivite' => $request->get('id')));
        if(is_null($participant))
        {
          $newparticipant = new Participe();
          $newparticipant->setIdactivite($request->get('id'));
          $newparticipant->setIdutilisateur($session->get('iduser'));
          $em = $this->get('doctrine.orm.entity_manager');
          $em->persist($newparticipant);
          $em->flush();
          echo 'Vous êtes désormais inscrit à cette activitée';
          return $this->render('activities.html.twig', array('activity'=>$activity));
        }
        else
        {
          echo 'Vous êtes déjà inscrit à cette activitée';
          return $this->render('activities.html.twig', array('activity'=>$activity));
        }
        }
      echo 'Vous devez avoir un compte pour vous inscrire';
          return $this->render('activities.html.twig', array('activity'=>$activity));

    }

}