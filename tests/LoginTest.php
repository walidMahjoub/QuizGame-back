<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class LoginTest extends WebTestCase
{

    /**
     * @var KernelBrowser
     */
    private $client;

    public function setUp()
    {
        $this->client = static::createClient();
    }

    public function testLogin()
    {
        $this->client->request(
            'POST',
            '/login',
            array(),
            array(),
            array('CONTENT_TYPE' => 'application/json'),
            json_encode(array(
                'username' => 'admin@gmail.com',
                'password' => 'admin',
            )));

        $this->assertSame(Response::HTTP_OK, $this->client->getResponse()->getStatusCode());
    }
}
