<?php

namespace DC\AdventureWeb;

use DC\AdventureGame\Position,
    DC\AdventureGame\Player,
    DC\AdventureGame\Factory\ApplicationFactory;

class GameProvider
{
    public function getGame()
    {
        $position = new Position('Some description');
        $player = new Player($position);
        return ApplicationFactory::createDefault($player);
    }
}