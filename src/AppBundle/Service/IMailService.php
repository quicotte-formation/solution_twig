<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Service;

/**
 *
 * @author tom
 */
interface IMailService {
    
    public function envoyer($to, $subject, $body);
}
