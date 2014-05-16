<?php

namespace DC\AdventureGame;


class PlayerTest extends \PHPUnit_Framework_TestCase
{


    /**
     * @test
     */
    public function it_wins_the_new_position_when_moving_to_it()
    {
        // Arrange
        $position_in_north = new Position('');
        $current_position = new Position('', ['north' => $position_in_north]);
        $player = new Player($current_position);

        // Act
        $player->moveTo('north');

        // Assert
        $this->assertEquals($position_in_north, $player->getCurrentPosition());
    }


    /**
     * @expectedException DC\AdventureGame\Exception\PositionDoesNotExistException
     * @test
     */
    public function it_raises_an_error_when_moving_to_an_unexisting_position()
    {
        // Arrange
        $current_position = new Position('');
        $player = new Player($current_position);

        // Act
        $player->moveTo('north');
    }

    /**
     * @test
     */
    public function it_gets_description_of_enviroment() 
    {
        // Arrange
        $description = 'Ves el mar';
        $current_position = new Position($description, array());
        $player = new Player($current_position);

        // Act

        // Assert
        $this->assertEquals($player->lookAt(), $description);
    }

}
