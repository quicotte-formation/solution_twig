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
     * @var \Doctrine\ORM\EntityManagerInterface
     */
    private $em;
    
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
    
    function __construct(\Doctrine\ORM\EntityManagerInterface $em, \Psr\Log\LoggerInterface $logger, MailService $mail) {
        $this->em = $em;
        $this->logger = $logger;
        $this->mail = $mail;
    }

        
    /**
     * 
     * @param \AppBundle\Entity\Client $client
     */
    public function inscription($client){

        $this->em->persist($client);
        $this->mail->envoyer("test@gmail.com", "BLABLA", "COUCOU");
        $this->logger->info("coucou");
        
    }
}
