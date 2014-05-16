<?php

namespace DC\AdventureGame\Factory;

use DC\AdventureGame\Player,
    DC\AdventureGame\Application;

class ApplicationFactory
{
    public static function createDefault(Player $player)
    {
        $application = new Application($player);
        $application->addCommand('move', function($player, $param) {
                $player->moveTo($param);        
            });
        $application->addCommand('look', function($player, $param) {
                return $player->lookAt($param);        
            });
        return $application;
        
    }
}
