<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * @Route("/asset")
 */
class AssetController extends Controller
{
    /**
     * @Route("/test")
     */
    public function testAction()
    {
        return $this->render('AppBundle:Asset:test.html.twig', array(
            // ...
        ));
    }

}
