<?php

namespace DC\AdventureGame\Command;

use DC\AdventureGame\Player;


class LookCommand implements CommandInterface
{
    public function execute(Player $player, $argument)
    {
        return $player->lookAt();
    }

    public function getName()
    {
        return 'look';
    }


}