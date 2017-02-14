<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ServiceController extends Controller
{
    /**
     * @Route("/inscription", name="inscription")
     */
    public function inscriptionAction(\Symfony\Component\HttpFoundation\Request $request){
        
        $client = new \AppBundle\Entity\Client();
        $form = $this->createForm( \AppBundle\Form\ClientType::class, $client );
        $form->add("submit", \Symfony\Component\Form\Extension\Core\Type\SubmitType::class);
        $form->remove("role");
        $form->handleRequest( $request );
        
        if( $form->isSubmitted() && $form->isValid() ){
            // Délègue TAF au service
            
            $this->get("client_service")->inscrire( $client );
            return new \Symfony\Component\HttpFoundation\Response("OK");
        }
        
        return $this->render( "AppBundle:Service:inscription.html.twig", 
                array("monForm"=>$form->createView()) );
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    /**
     * @Route("/serviceTest")
     */
    public function serviceTestAction()
    {
//        $loggingService = new \AppBundle\Service\LoggingService();
        
        $cli = new \AppBundle\Entity\Client();
        $cli->setLogin("test");
        $cli->setMdp("test");
        $cli->setRole("ROLE_NORMAL");
        
        $clientService = $this->get("client");
        $clientService->inscription($cli);
        
        return $this->render('AppBundle:Service:service_test.html.twig', array(
            // ...
        ));
    }

}
