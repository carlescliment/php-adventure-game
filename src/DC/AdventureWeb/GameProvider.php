<?php

namespace DC\AdventureWeb;

use DC\AdventureGame\Position,
    DC\AdventureGame\Player,
    DC\AdventureGame\Factory\ApplicationFactory;

class GameProvider
{
    public function getGame()
    {
        $east_position = new Position('East Position');
        $north_position = new Position('North Position', array('east' => $east_position));
        $initial_position = new Position('Some description', array('north' => $north_position));
        $player = new Player($initial_position);
        return ApplicationFactory::createDefault($player);
    }
}