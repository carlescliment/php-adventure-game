<?php

use Silex\WebTestCase;

class FunctionalTest extends WebTestCase
{

    public function createApplication()
    {
        $app = require __DIR__.'/../web/app-build.php';
        $app['debug'] = true;
        $app['exception_handler']->disable();
        $app['environment'] = 'test';
        $app['game'] = $this->getMockBuilder('DC\AdventureGame\Application')
            ->disableOriginalConstructor()
            ->getMock();
        return $app;
    }


    /**
     * @test
     */
    public function it_shows_the_description_of_the_current_position()
    {
        $this->app['game']->expects($this->once())
            ->method('execute')
            ->with('look')
            ->will($this->returnValue('Some description'));
        $client = $this->createClient();

        $crawler = $client->request('GET', '/', ['command' => 'look']);

        $aparitions = $crawler->filter('html:contains("Some description")')->count();
        $this->assertEquals(1, $aparitions);
    }
}

