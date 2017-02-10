<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class SecurityController extends Controller
{
    /**
     * @Route("secuByCode")
     */
    public function secuByCodeAction(){
        $this->denyAccessUnlessGranted( "ROLE_SIMPLE" );
        
        return $this->render('AppBundle:Security:security_by_annotation.html.twig', array(
            // ...
        ));
    }
    
    /**
     * @Security("has_role('ROLE_SIMPLE')")
     * @Route("/securityByAnnotation")
     * 
     */
    public function securityByAnnotationAction()
    {
        return $this->render('AppBundle:Security:security_by_annotation.html.twig', array(
            // ...
        ));
    }

}
