<?php

namespace Login\LoginBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $userName = "Charith";
        $password = "password";
        
        $em = $this->getDoctrine()->getEntityManager();
        $repository = $em ->getRepository('LoginLoginBundle:Users');
        
        $user = $repository ->findOneBy(array('userName'=>$userName,'password'=>$password));
        
        if($user) 
        {
             return $this->render('LoginLoginBundle:Default:login.html.twig', array('name' => $user->getFirstName()));
            
        }
        else 
        {
            
             return $this->render('LoginLoginBundle:Default:login.html.twig', array('name' => 'Login Failed'));
            
        }
        
        
       
    }
}
