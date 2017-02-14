<?php

namespace AppBundle\Service;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CommandeService
 *
 * @author tom
 */
class ClientService implements IClientService {

    /**
     *
     * @var \Doctrine\ORM\EntityManagerInterface
     */
    private $em;
    
    /**
     *
     * @var IMailService
     */
    private $mailService;

    function __construct(\Doctrine\ORM\EntityManagerInterface $em, IMailService $mailService) {
        $this->em = $em;
        $this->mailService = $mailService;
    }

        
    public function inscrire(\AppBundle\Entity\Client $client){
        
        // Persiste client en DB
        $client->setRole("ROLE_SIMPLE");
        $this->em->persist( $client );
        $this->em->flush();
        
        // Envoir un mail de confirmation
        $this->mailService->envoyer("blaba@gmail.com", "Validez votre inscription", "blabla");
        
        // Aujoute ds le journal des logs qu'un nouveau cli s'est inscrit
    }
}
