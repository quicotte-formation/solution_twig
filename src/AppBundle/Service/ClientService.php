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
class ClientService {

    /**
     *
     * @var \Doctrine\ORM\EntityManagerInterface
     */
    private $em;
    
    
    function __construct(\Doctrine\ORM\EntityManagerInterface $em) {
        $this->em = $em;
    }

    
    
    
    
    
    
    
    
    
    /**
     *
     * @var \Psr\Log\LoggerInterface 
     */
    private $logger;
    
    /**
     *
     * @var MailService
     */
    private $mail;
    
//    function __construct(\Doctrine\ORM\EntityManagerInterface $em, \Psr\Log\LoggerInterface $logger, MailService $mail) {
//        $this->em = $em;
//        $this->logger = $logger;
//        $this->mail = $mail;
//    }

        
    /**
     * 
     * @param \AppBundle\Entity\Client $client
     */
    public function inscription($client){

        $this->em->persist($client);
        $this->mail->envoyer("test@gmail.com", "BLABLA", "COUCOU");
        $this->logger->info("coucou");
        
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    public function inscrire(\AppBundle\Entity\Client $client){
        
        // Persiste client en DB
        $client->setRole("ROLE_SIMPLE");
        $this->em->persist( $client );
        $this->em->flush();
        
        // Envoir un mail de confirmation
        
        // Aujoute ds le journal des logs qu'un nouveau cli s'est inscrit
    }
}
