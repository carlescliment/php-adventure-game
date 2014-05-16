<?php

namespace DC\AdventureGame\Command;

use DC\AdventureGame\Player;

class MoveCommand implements CommandInterface
{
    public function execute(Player $player, $argument)
    {
        return $player->moveTo($argument);
    }

    public function getName()
    {
        return 'move';
    }

}