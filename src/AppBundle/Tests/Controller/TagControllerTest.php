<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TagControllerTest extends WebTestCase
{
    public function testInclude()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/include');
    }

}
