<?php

namespace Login\LoginBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
        if($request->getMethod() == 'POST')
        {
            $userName = $request->get('inputEmail');
            $password = $request->get('inputPassword');
            
            $em = $this->getDoctrine()->getEntityManager();
            $repository = $em ->getRepository('LoginLoginBundle:Users');
        
            $user = $repository ->findOneBy(array('userName'=>$userName,'password'=>$password));
        
            if($user) 
            {
                return $this->render('LoginLoginBundle:Default:login.html.twig',array('name' => $user->getFirstName()));
            
            }
            
        }    
        else 
        {
            
             return $this->render('LoginLoginBundle:Default:login.html.twig');
            
        }
        
        
       
    }
}
