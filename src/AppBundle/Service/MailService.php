<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Service;

use \Exception;

/**
 * Description of MailService
 *
 * @author tom
 */
class MailService implements IMailService{

    /**
     *
     * @var \Swift_Mailer
     */
    private $mailer;
    
    /**
     *
     * @var \Psr\Log\LoggerInterface 
     */
    private $logger;

    /**
     *
     * @var string 
     */
    private $compteEmetteur;

    function __construct(\Swift_Mailer $mailer) {
        $this->mailer = $mailer;
    }

    
    
//    function __construct(\Swift_Mailer $mailer, \Psr\Log\LoggerInterface $logger, $compteEmetteur) {
//        $this->mailer = $mailer;
//        $this->logger = $logger;
//        $this->compteEmetteur = $compteEmetteur;
//    }

    public function envoyer($to, $subject, $body) {

//        $this->logger->info("Message envoyé depuis: " . $this->compteEmetteur);

        $msg = \Swift_Message::newInstance();
        $msg->setTo($to);
        $msg->setSubject($subject);
        $msg->setBody($body);
        $msg->setFrom("quicotte@gmail.com");
        $this->mailer->send($msg);
        throw new Exception("MADE IN FLANDRES ( BELGES ! )");
    }

}
