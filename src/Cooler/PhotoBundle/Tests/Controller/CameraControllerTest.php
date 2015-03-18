<?php

namespace Cooler\PhotoBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CameraControllerTest extends WebTestCase
{
    public function testCamera()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/camera');
    }

}
