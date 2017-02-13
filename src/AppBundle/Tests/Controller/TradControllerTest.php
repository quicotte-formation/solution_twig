<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TradControllerTest extends WebTestCase
{
    public function testTradsimple()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/tradSimple');
    }

}
