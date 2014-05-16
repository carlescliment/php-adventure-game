<?php

namespace DC\AdventureGame;

class Application
{

    private $player;

    private $commands;


    public function __construct(Player $player) 
    {
        $this->player = $player;
        $this->commands = [];
    }


    public function addCommand($name, $callable)
    {
        $this->commands[$name] = $callable;
    }


    public function execute($command)
    {
        $array_command = explode(" ", $command);
        $action = $this->getAction($array_command);
        $param = null;
        if (!empty($array_command[1])) {
            $param = $array_command['1']; 
        }
        return $this->commands[$action]($this->player, $param);
    }

    private function getAction(array $array_command)
    {
        return $array_command[0];
    }
}