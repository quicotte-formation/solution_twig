<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * @Route("/ajax")
 */
class AjaxController extends Controller
{
    /**
     * @Route("/listerProduits", name="ajax_lister_produits")
     */
    public function listerProduitsAction()
    {
        // Récup produits à partir repos
        $produits = $this->getDoctrine()->getRepository("AppBundle:Produit")->findAll();
        
        return $this->render('AppBundle:Ajax:lister_produits.html.twig', array(
            "produits"=>$produits
        ));
    }

}
