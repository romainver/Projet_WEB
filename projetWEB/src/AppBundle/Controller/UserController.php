<?php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\User;

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
}