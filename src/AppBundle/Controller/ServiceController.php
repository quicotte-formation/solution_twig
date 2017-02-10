<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ServiceController extends Controller
{
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
