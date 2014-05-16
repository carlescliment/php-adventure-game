<?php

namespace DC\AdventureGame\Factory;

use DC\AdventureGame\Player,
    DC\AdventureGame\Application,
    DC\AdventureGame\Command as Commands;

class ApplicationFactory
{
    public static function createDefault(Player $player)
    {
        $application = new Application($player);
        $application->addCommand(new Commands\MoveCommand);
        $application->addCommand(new Commands\LookCommand);
        return $application;
        
    }
}
