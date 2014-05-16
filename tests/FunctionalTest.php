<?php

use Silex\WebTestCase;

use Symfony\Component\HttpFoundation\Session\Storage\MockArraySessionStorage;
use DC\Fixtures\GameProvider;

class FunctionalTest extends WebTestCase
{

    public function createApplication()
    {
        $app = require __DIR__.'/../web/app-build.php';
        $app['debug'] = true;
        $app['exception_handler']->disable();
        $app['environment'] = 'test';
        $app['game_provider'] = new GameProvider();
        $app['session.storage'] = new MockArraySessionStorage();
        return $app;
    }


    /**
     * @test
     */
    public function it_does_not_begin_the_game_when_visiting_homepage_load() 
    {
        $client = $this->createClient();

        $client->request('GET', '/');

        $this->assertContains('Start game', $client->getResponse()->getContent());
    } 

    /**
     * @test
     */
    public function it_shows_an_input_field_when_the_game_is_started() 
    {
        $client = $this->createClient();
        $client->request('GET', '/start');

        $crawler = $client->request('GET', '/');

        $inputs = $crawler->filter('input.command')->count();
        $this->assertEquals(1, $inputs);
    } 


    /**
     * @test
     */
    public function it_shows_the_description_of_the_current_position()
    {
        $client = $this->createClient();
        $client->request('GET', '/start');

        $crawler = $client->request('GET', '/', ['command' => 'look']);

        $aparitions = $crawler->filter('html:contains("Some description")')->count();
        $this->assertEquals(1, $aparitions);
    }

    /**
     * @test
     */
    public function it_ends_the_game () {
        $client = $this->createClient();
        $client->request('GET', '/start');
        $client->request('GET', '/end');

        $crawler = $client->request('GET', '/');

        $this->assertContains('Start game', $client->getResponse()->getContent());

    }
}

