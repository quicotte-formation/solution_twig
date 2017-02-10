<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Service;

/**
 * Description of MailService
 *
 * @author tom
 */
class MailService {
    
    /**
     *
     * @var \Swift_Mailer
     */
    private $mailer;
    
    function __construct(\Swift_Mailer $mailer) {
        $this->mailer = $mailer;
    }
    
    function envoyer($to, $subject, $body){
        
        $msg = \Swift_Message::newInstance();
        $msg->setTo( $to );
        $msg->setSubject( $subject );
        $msg->setBody( $body );
        $msg->setFrom("quicotte@gmail.com");
        $this->mailer->send($msg);
    }
}
