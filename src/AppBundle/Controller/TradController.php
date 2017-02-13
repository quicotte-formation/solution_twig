<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class TradController extends Controller
{
    
    /**
     * @Route("/tradControleur")
     */
    public function tradControleurAction()
    {
        $trad = $this->get("translator")->trans("Coucou");
        
        return new \Symfony\Component\HttpFoundation\Response( $trad );
    }
    
    /**
     * @Route("/tradSimple")
     */
    public function tradSimpleAction()
    {
        $this->get("translator")->trans("Cuicou");
        
        return $this->render('AppBundle:Trad:trad_simple.html.twig', array(
            "nom"=>"Ferigno",
            "prenom"=>"Lou"
        ));
    }

}
