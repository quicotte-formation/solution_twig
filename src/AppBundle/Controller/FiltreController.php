<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * @Route("/filtres")
 */
class FiltreController extends Controller
{
    /**
     * @Route("/cycle")
     */
    public function cycleAction(){
        
        $produits = $this->getDoctrine()->getRepository("AppBundle:Produit")->findAll();
        
        return $this->render("AppBundle:Filtre:cycle.html.twig",
                array("produits"=> $produits)
                );
    }
    
    /**
     * @Route("/test")
     */
    public function testAction()
    {
        return $this->render('AppBundle:Filtre:test.html.twig', array(
            // ...
        ));
    }

}
