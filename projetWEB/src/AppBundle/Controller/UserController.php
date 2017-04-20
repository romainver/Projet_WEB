<?php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\User;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Session\Session;

class UserController extends Controller
{
    /**
     * @Route("/disconnect")
     */
      public function disconnect(Request $request)
      {
        $session = $request->getSession();
        $session->set('username','');
        $session->set('iduser','');
        return $this->redirectToRoute('home');
      }

    /**
     * @Route("/users", name="users_list")
     * @Method({"POST"})
     */
    public function userCheckId(Request $request)
    {
      $user = $this->get('doctrine.orm.entity_manager')
      ->getRepository('AppBundle:User')
      ->findOneBy(array('Email' => $_POST['Email'],'Motdepasse' => $_POST['pass']));
      if(is_null($user))
      {
        echo 'pas de compte';
      }
      else
      {
        $session = $request->getSession();
        $session->set('username',$user->getPrenom());
        $session->set('iduser', $user->getIdUtilisateur());

       // $session->setId($user->getIdUtilisateur());
        
      }

      return $this->render('home.html.twig');
    }


    /**
     * @Route("/register", name="registration")
     */
    public function newAccount(Request $request)
    {
      $user = new User();
      $form = $this->createFormBuilder($user)
      ->add('Nom', TextType::class)
      ->add('Prenom', TextType::class)
      ->add('Age', TextType::class)
      ->add('Promotion', TextType::class)
      ->add('Phrasechoc', TextType::class)
      ->add('Avatar', TextType::class)
      ->add('Email', TextType::class)
      ->add('Motdepasse', TextType::class)
      ->add('Categorie', TextType::class)
      ->add('save', SubmitType::class, array('label' => 'Creer un compte'))
      ->getForm();
      $form->handleRequest($request);
      if($form->isSubmitted() && $form->isValid())
      {
         $task = $form->getData();
         $em = $this->getDoctrine()->getManager();
         $em->persist($task);
         $em->flush();
        return $this->redirectToRoute('home');
      }

      return $this->render('test.html.twig', array(
        'form' => $form->createView(),
        )); 
    }



}

