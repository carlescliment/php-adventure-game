<?php

namespace DC\AdventureGame;


class Player
{
    private $position;

    public function __construct(Position $position)
    {
        $this->position = $position;
    }

    public function getCurrentPosition()
    {
        return $this->position;
    }

    public function moveTo($position) 
    {
        $this->position = $this->position->getNeighbour($position);
    }

    public function lookAt() 
    {
        return $this->position->getDescription();
    }

}