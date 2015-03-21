<?php

namespace Cooler\MainBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AjaxControllerTest extends WebTestCase
{
    public function testSearchbeer()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/searchBeer');
    }

}
