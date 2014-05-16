<?php

namespace DC\AdventureGame;

use DC\AdventureGame\Factory\ApplicationFactory;

class ApplicationTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function it_moves_a_player_through_the_scenario()
    {
        // Arrange
        $north = new Position();
        $current = new Position(['north' => $north]);
        $player = new Player($current);
        $application = ApplicationFactory::createDefault($player);

        // Act
        $application->execute('move north');

        // Assert
        $this->assertEquals($north, $player->getCurrentPosition());

    }


    /**
     * @test
     */
    public function it_returns_the_description_when_looking()
    {
        // Arrange
        $description = 'You see the beach';
        $player = $this->getMockBuilder('DC\AdventureGame\Player')
            ->disableOriginalConstructor()
            ->getMock();
        $application = ApplicationFactory::createDefault($player);
        $player->expects($this->any())
            ->method('lookAt')
            ->will($this->returnValue($description));


        // Act
        $returned = $application->execute('look');

        // Expect
        $this->assertEquals($description, $returned);

    }
}