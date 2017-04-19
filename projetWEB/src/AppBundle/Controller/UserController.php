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

class UserController extends Controller
{
    /**
     * @Route("/users", name="users_list")
     * @Method({"POST"})
     */
    public function userCheckId(Request $request)
    {
      $user = $this->get('doctrine.orm.entity_manager')
      ->getRepository('AppBundle:User')
      ->findOneBy(array('Email' => $_POST['email'],'Motdepasse' => $_POST['pass']));
      if(is_null($user))
      {
        echo 'pas de compte';
      }
      else
      {
        echo 'bonjour '.$user->getPrenom();
      }

      return new Response();
    }


    /**
     * @Route("/register", name="registration")
     * @Method({"GET"})
     */
    public function newAccount()
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
      ->add('save', SubmitType::class, array('label' => 'Creer un compte'))
      ->getForm();

      $form->handleRequest($request);

      if ($form->isSubmitted() && $form->isValid()) {
        // $form->getData() holds the submitted values
        // but, the original `$task` variable has also been updated
        $task = $form->getData();
        $em = $this->getDoctrine()->getManager();
        $em->persist($task);
        $em->flush();

        return $this->redirectToRoute('task_success');
      }

      return $this->render('test.html.twig', array(
        'form' => $form->createView(),
        ));
    }
  }