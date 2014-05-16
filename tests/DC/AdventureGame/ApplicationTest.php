<?php

namespace DC\AdventureGame;

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
        $application = new Application($player);

        // Act
        $application->execute('move north');

        // Assert
        $this->assertEquals($north, $player->getCurrentPosition());

    }

}