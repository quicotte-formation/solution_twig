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
     * @Route("/lister_json", name="ajax_lister_json")
     */
    public function listerJSONAction(){
        
        // Liste produits
        $produits = $this->getDoctrine()->getRepository("AppBundle:Produit")->findAll();
        
        $res=array();
        foreach ($produits as $prod){
            $dto = new \AppBundle\DTO\ProduitDTO();
            $dto->prix=$prod->getPrix();
            $dto->titre=$prod->getTitre();
            $res[] = $dto;
        }
        
        // Renvoie du JSON
        return $this->json( $res );
    }
    
    /**
     * @Route("/ajouter_prod", name="ajax_ajouter_prod")
     */
    public function ajouterProdAction(\Symfony\Component\HttpFoundation\Request $request){
        
        $dto = new \AppBundle\Entity\Produit();
        $form = $this->createForm(\AppBundle\Form\ProduitType::class, $dto);
        $form->handleRequest($request);
        
        // Mon produit est initialisé
        $this->getDoctrine()->getManager()->persist( $dto );
        $this->getDoctrine()->getManager()->flush();
        
        
        // Redirection
        return $this->redirectToRoute("ajax_lister_produits");
    }
    
    /**
     * @Route("/sup_prod/{id}", name="ajax_sup_prod")
     */
    public function supProdAction($id){
        
        // Supprime ce produit
        $qb = new \Doctrine\ORM\QueryBuilder( $this->getDoctrine()->getManager() );
        $qb->delete()->from("AppBundle:Produit", "p")->where("p.id=:prodId")->setParameter("prodId", $id)->getQuery()->execute();
        
//        return $this->redirectToRoute("ajax_lister_produits");
        
        return new \Symfony\Component\HttpFoundation\Response("OK");
    }
    
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
