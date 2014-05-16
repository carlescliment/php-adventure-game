<?php

namespace DC\AdventureGame;

class Application
{

    private $player;

    public function __construct(Player $player) 
    {
        $this->player = $player;
    }

    public function execute($order)
    {
        $array_order = explode(" ", $order);
        $action = $array_order['0'];
        $param = $array_order['1']; 
        $this->player->moveTo($param);
        
    }
}