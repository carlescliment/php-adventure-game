<?php

namespace DC\AdventureGame\Command;

use DC\AdventureGame\Player;

interface CommandInterface
{
    public function execute(Player $player, $argument);
    public function getName();
}
