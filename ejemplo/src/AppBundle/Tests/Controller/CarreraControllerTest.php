<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CarreraControllerTest extends WebTestCase
{
    public function testCrear()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/carrera/crear');
    }

    public function testEditar()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/carrera/editar');
    }

    public function testListar()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/carrera/listar');
    }

    public function testEliminar()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/carrera/eliminar');
    }

}
