<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class TagController extends Controller
{
    /**
     * @Route("/macro")
     */
    public function macroAction(){
        
        return $this->render('AppBundle:Tag:macro.html.twig');
    }
    
    /**
     * @Route("/embedArmesFamiliales")
     */
    public function embedArmesFamilialesAction(){
        
        $mesProduits = $this->getDoctrine()->getRepository("AppBundle:Produit")->listerArmesFamiliales(5);
        
        return $this->render('AppBundle:Tag:embedArmesFamilialesAction.html.twig',
                array(
                    "produits"=>$mesProduits
                ));
    }
    
    /**
     * @Route("/embedArmesPrestige")
     */
    public function embedArmesPrestigeAction(){
        
        $mesProduits = $this->getDoctrine()->getRepository("AppBundle:Produit")->listerArmesPrestige(5);
        
        return $this->render('AppBundle:Tag:embedArmesPrestige.html.twig',
                array(
                    "produits"=>$mesProduits
                ));
    }
    
    /**
     * @Route("/embed")
     */
    public function embedAction(){
        return $this->render('AppBundle:Tag:embed.html.twig');
    }
    
    /**
     * @Route("/include")
     */
    public function includeAction()
    {
        return $this->render('AppBundle:Tag:include.html.twig', array(
            "book"=>array("titre"=>"Le rouge et le noir",
                "urlImage"=>"blabla",
                "dateParution"=>1830)
        ));
    }

}
